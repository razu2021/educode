<?php

namespace App\Http\Controllers\backend\subscription;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseEnroment;
use App\Models\Payment;
use App\Models\SiteAddress;
use App\Models\SiteEmail;
use App\Models\SitePhone;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentGatewayFactory;
use App\Services\Payment\StripePaymentService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf; //-------------Export --------


class PaymentController extends Controller
{
    
    public function initiatePayment(Request $request)
    {

        $plan_id = $request->plan_id;
        $plan_slug = $request->plan_slug;
        $plan_data= SubscriptionPlan::where('id', $plan_id)->where('slug', $plan_slug)->first();
        if (!$plan_data) {
            return response()->json(['error' => 'Invalid plan'], 404);
        }
        //$amount = $plan_data->usd_price;
        $gateway = PaymentGatewayFactory::make();
        $paymentData = $gateway->createPaymentIntent($plan_data);

      return response()->json([
            'clientSecret' => $paymentData['clientSecret'],
            'payment_intent_id' => $paymentData['intentId'],
        ]);
    }

    /**=============  stripe webhook secrate function ======= */

    public function handle_webhook_request(Request $request){

        $gateway = new StripePaymentService();    // gate webhook secret come form stripe dashboard .....  

        return $gateway->handleWebhook($request);
        
    }


    public function handleSuccess($paymentIntent){

        $metadata = $paymentIntent->metadata;

        // metadata information get 
        $user_id = $metadata->user_id ?? null;
        $user_name = $metadata->user_name ?? null ;
        $user_email = $metadata->user_email ?? null ;

        // get plan data form metadata 
        $plan_id = $metadata->plan_id ?? null ;
        $plan_for = $metadata->plan_for ?? null ;
        $plan_name = $metadata->plan_name ?? null ;
        $plan_interval = $metadata->plan_interval ?? null ;
        $course_limit = $metadata->course_limit ?? null ; 


            Payment::create([
                'plan_id'=>$plan_id,
                'user_id'=>$user_id,
                'payment_gateway'=>$paymentIntent->payment_method,
                'payment_id'=>$paymentIntent->id,
                'currency'=>$paymentIntent->currency,
                'amount'=>$paymentIntent->amount / 100,
                
            ]);
      
            $insert = Subscription::create([
                'plan_id'=>$plan_id,
                'user_id'=>$user_id,
            ]);

          
             return response()->json(['status' => 'received'], 200);
     
        
    }

    /**=============  stripe webhook secrate function ======= */


    /**============  payment success page ========= */
    public function payment_status(Request $request){


        Log::info("payment intend id " . $request->payment_intent_id);


        $payment = Payment::where('payment_id',$request->payment_intent_id)->first();

        Log::info('Payment data ' . $payment);


        if (!$payment) {
        return response()->json(['status' => 'processing']);
        }

        if ($payment->status === 'success') {
            return response()->json(['status' => 'success']);
        } elseif ($payment->status === 'failed') {
            return response()->json(['status' => 'failed']);
        } else {
            return response()->json(['status' => 'processing']);
        }
    }


    public function payment_processing(){
        
        return view('instructor.pages.subscription.payment_processing');
    }
    /**============  payment success page ========= */
    // public function payment_success(){
        
    //     return view('instructor.pages.subscription.payment_success');
    // }





    // =============  using ssl commerce =========








    /**--------------------------  
     * 
     * ================================================SSLCommerze Payment function start here ==========================================
     * 
     * ---------------------- */


    public function sslpayment_initiate($id, $slug)
    {
        $user = Auth::user();  // লগড ইন ইউজারের ডেটা

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to continue');
        }

        $sessionKey = 'checkout_course_' . $id . '_' . $slug;
        $checkoutData = Session::get($sessionKey);

        if (!$checkoutData || !isset($checkoutData['checkout_price'])) {
            return redirect()->route('course_details', [$id, $slug])
                            ->with('error', 'Your checkout session has expired or is invalid. Please try again.');
        }

        $course_data = Course::where('id', $checkoutData['course_id'])
                            ->where('slug', $checkoutData['course_slug'])
                            ->firstOrFail();

        $lastprice = Crypt::encryptString($checkoutData['checkout_price']);
        $course_id = Crypt::encryptString($checkoutData['course_id']);
        $course_slug = Crypt::encryptString($checkoutData['course_slug']);
        $encryptedCoupon = $checkoutData['coupon_code'] ?? null;


        return view('backend.subscription.payment.sslpayment_initiate', compact('lastprice','course_id','course_slug','checkoutData', 'encryptedCoupon', 'course_data', 'user'));
    }





    /**==============  payment create functionality start here ================= */
    public function ssl_paymentCreate(Request $request)
    {
        try {
            // Step 1: Decrypt incoming encrypted values from form 
            $decryptedCourseId = Crypt::decryptString($request->input('course_id'));
            $decryptedCourseSlug = Crypt::decryptString($request->input('course_slug'));
            $decryptedPrice = Crypt::decryptString($request->input('actual_price'));
            $phone = $request->phone;
            $division = $request->division;
            $city = $request->city;
            $country = $request->country;
        } catch (\Exception $e) {
            return back()->withErrors('Invalid or tampered data received.');
        }

        // Step 2: Retrieve session data securely 
        $sessionKey = 'checkout_course_' . $decryptedCourseId . '_' . $decryptedCourseSlug;
        $checkoutData = Session::get($sessionKey);
        $course_data= Course::where('id',$decryptedCourseId )->where('slug',$decryptedCourseSlug)->first();
        if (!$checkoutData) {
            return back()->withErrors('Checkout session expired or invalid.');
        }

        // Step 3: Match decrypted price with session-stored price 
        if ($decryptedPrice != $checkoutData['checkout_price']) {
            return back()->withErrors('Price mismatch detected. Possible tampering!');
        }

        // Step 4: Generate secure transaction ID
        $trans_id = 'Trans' . time() . rand(10000, 99999999);
        $invoice_id = strtoupper(Str::random(4)) . mt_rand(10000, 100000);

        //---------------------------------------------------------------------------
         $existing_enrollment = CourseEnroment::where('user_id',Auth::user()->id)
         ->where('course_id',$decryptedCourseId)
         ->whereHas('payment',function($q){
            $q->where('payment_status', 'VALID');
         })->first();

         if($existing_enrollment){
           return redirect()->route('exist.course',$existing_enrollment->course_id);
         }
        // --------------------------------------------------------------------------------

        // Step 5 : store Payment information in Payment table 
        $payment = Payment::create([
           'course_id'=>$decryptedCourseId,
            'user_id'=>Auth::user()->id,
            'tran_id'=>$trans_id,
            'currency'=>'BDT',
            'amount'=>$checkoutData['checkout_price'],
            'store_amount'=>$checkoutData['checkout_price'],
            'invoice_id'=> $invoice_id,
            'phone'=> $phone,
            'division'=> $division,
            'city'=> $city,
            'country'=> $country,
            'payment_status'=>'PENDING',
            'public_status'=>1,
            'status'=>1,
        

        ]);

    

        // Step 5: Prepare data for gateway
        $data = [
            'amount' => $checkoutData['checkout_price'],
            'success_url' => route('ssl_payment.success'),
            'fail_url' => route('ssl_payment.fail'),
            'cancel_url' => route('ssl_payment.cancel'),
            'customer_name' => $request->name ?? Auth::user()->name ??  'Guest',
            'email' => $request->email ?? Auth::user()->email ?? 'guest@example.com',
            'phone' => $request->phone ?? '01817078309',
            'tran_id' => $trans_id,
            'phone'=>$phone,
            'division'=>$division,
            'city'=>$city,
            'country'=>$country,
            'product_name'=>$course_data->course_name,
        ];

        // Step 6: Create gateway and redirect to payment
        $gateway = PaymentGatewayFactory::make('sslcommerz');
        return $gateway->makePayment($data);
    }







    public function handleIpn(Request $request)
    {
       

        try {
            $gateway = PaymentGatewayFactory::make('sslcommerz');
            $result = $gateway->handleWebhook($request);
            return response()->json(['message' => 'IPN Processed'], 200);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Server Error'], 500);
        }
    }



    public function ssl_paymentSuccess(Request $request){

        
        // Request থেকে দরকারি ডেটা বের করো.
     
        $tranId = $request->input('tran_id');
        $amount = $request->input('amount');
        $cardType = $request->input('card_type');
        $status = $request->input('status');

        $payment= Payment::where('tran_id',$tranId)->first();

        if(!$payment || $payment->payment_status !== 'VALID'){
            return redirect()->route('ssl_payment.fail');
        }

        return view('backend.subscription.payment.sslpayment_success',compact('payment'));
    }


    public function ssl_paymentFail(Request $request){




        return view('backend.subscription.payment.sslpayment_faild');
    }
    public function ssl_paymentCancel(Request $request){
       return view('backend.subscription.payment.sslpayment_cencil');
    }




    public function downloadInvoice($tran_id){

        try{
            $payment_data= Payment::where('tran_id',$tran_id)->first();

            $enrol_data = CourseEnroment::where('payment_id',$payment_data->id)->first();

            $course_data =  $enrol_data->course;

            $original_price   = $course_data->coursePrice->original_price ?? 0;
            $discounted_price = $course_data->coursePrice->discounted_price ?? 0;
            $coupon_price     = $course_data->courseCoupon->discount_amount ?? 0;
            $coupon_type      = $course_data->courseCoupon->discount_type ?? 'Fixed';
            $sitemail = SiteEmail::where('public_status',1)->pluck('email')->first();
            $sitephone = SitePhone::where('public_status',1)->pluck('phone')->first();
            $siteaddress = SiteAddress::where('public_status',1)->pluck('address')->first();
           
             $pdf = PDF::loadView('backend.subscription.payment.payment_invoice',compact(
                 'payment_data','course_data','original_price','discounted_price',
                 'coupon_price','coupon_type','sitemail','sitephone','siteaddress'));

        //    $pdf = PDF::loadView('backend.subscription.payment.payment_invoice', compact(
        //         'payment_data','course_data','original_price','discounted_price','coupon_price','coupon_type','siteemail','sitephone','siteaddress'
        //     ));

        //     // Option 1: Direct Download
            return $pdf->download('invoice_'.$tran_id.'.pdf');

        


        }catch(\Exception $e){
            return "Opps! Something went wrong ";
        }
       
    }





    public function exist_course($id){


        return view('backend.subscription.payment.exist_course');
    }




/**  controller end here  */
}




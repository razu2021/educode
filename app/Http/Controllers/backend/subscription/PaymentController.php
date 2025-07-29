<?php

namespace App\Http\Controllers\backend\subscription;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentGatewayFactory;
use App\Services\Payment\StripePaymentService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;


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
     * SSLCommerze Payment function start here 
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





    public function ssl_paymentCreate(Request $request)
    {
        try {
            // Step 1: Decrypt incoming encrypted values from form 
            $decryptedCourseId = Crypt::decryptString($request->input('course_id'));
            $decryptedCourseSlug = Crypt::decryptString($request->input('course_slug'));
            $decryptedPrice = Crypt::decryptString($request->input('actual_price'));
        } catch (\Exception $e) {
            return back()->withErrors('Invalid or tampered data received.');
        }

        // Step 2: Retrieve session data securely 
        $sessionKey = 'checkout_course_' . $decryptedCourseId . '_' . $decryptedCourseSlug;
        $checkoutData = Session::get($sessionKey);

        if (!$checkoutData) {
            return back()->withErrors('Checkout session expired or invalid.');
        }

        // Step 3: Match decrypted price with session-stored price 
        if ($decryptedPrice != $checkoutData['checkout_price']) {
            return back()->withErrors('Price mismatch detected. Possible tampering!');
        }

        // Step 4: Generate secure transaction ID
        $trans_id = 'Tan_' . time() . rand(10000, 99999999);


        // Step 5 : store Payment information in Payment table 

        $payment = Payment::create([
           // 'course_id'=>$decryptedCourseId,
            'user_id'=>Auth::user()->id,
            'tran_id'=>$trans_id,
            'currency'=>'BDT',
            'amount'=>$checkoutData['checkout_price'],
            'store_amount'=>$checkoutData['checkout_price'],
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
        ];

        // Step 6: Create gateway and redirect to payment
        $gateway = PaymentGatewayFactory::make('sslcommerz');
        return $gateway->makePayment($data);
    }







    public function handleIpn(Request $request)
    {
        Log::info('✅ handleIpn METHOD HIT');

        try {
            $gateway = PaymentGatewayFactory::make('sslcommerz');
            Log::info('✅ Gateway created:', [$gateway]);

            $result = $gateway->handleWebhook($request);
            Log::info('✅ Webhook handled:', [$result]);

            return response()->json(['message' => 'IPN Processed'], 200);
        } catch (\Throwable $e) {
            Log::error('❌ IPN Error: ' . $e->getMessage());
            return response()->json(['error' => 'Server Error'], 500);
        }
    }



    public function ssl_paymentSuccess(Request $request){
        return view('backend.subscription.payment.sslpayment_success');
    }
    public function ssl_paymentFail(Request $request){
        return "payment Faild ";
    }
    public function ssl_paymentCancel(Request $request){
        return "payment Cancel ";
    }










/**  controller end here  */
}




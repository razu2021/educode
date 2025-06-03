<?php

namespace App\Http\Controllers\backend\subscription;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentGatewayFactory;
use App\Services\Payment\StripePaymentService;
use Illuminate\Support\Facades\Log;

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

    public function paywithsslCommerz(){
        $data = [
        'amount' => 1000,
        'success_url' => route('payment.success'),
        'fail_url' => route('payment.fail'),
        'cancel_url' => route('payment.cancel'),
        'customer_name' => 'Md Razu Hossain Raj',
        'email' => 'raj@example.com',
        'phone' => '017xxxxxxxx',
    ];

    $gateway = PaymentGatewayFactory::make('sslcommerz');
    return $gateway->makePayment($data);
    
    }












}




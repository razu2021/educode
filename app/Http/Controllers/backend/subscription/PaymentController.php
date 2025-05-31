<?php

namespace App\Http\Controllers\backend\subscription;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentGatewayFactory;
class PaymentController extends Controller
{
    
    public function initiatePayment(Request $request)
    {


        $amount = $request->amount; // frontend থেকে আসবে
        $gateway = PaymentGatewayFactory::make();
        $paymentData = $gateway->createPaymentIntent($amount);


        return response()->json([
            'clientSecret' => $paymentData['clientSecret'],
        ]);
    }


 public function completePayment(Request $request)
{

    $insert = Subscription::create([
        'plan_id'=>1,
        'user_id'=>1,
    ]);

   return "payment complete";
}

    /**============  payment success page ========= */
    public function payment_success(){
        
        return view('instructor.pages.subscription.payment_success');
    }





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




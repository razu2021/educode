<?php

namespace App\Http\Controllers\backend\subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentGatewayFactory;
class PaymentController extends Controller
{
    
    public function initiatePayment(Request $request)
    {
         dd($request->all());

    $amount = $request->amount; // frontend থেকে আসবে



    $gateway = PaymentGatewayFactory::make();
    $paymentData = $gateway->createPaymentIntent($amount);


        return response()->json([
            'clientSecret' => $paymentData['clientSecret'],
        ]);
    }


 public function completePayment(Request $request)
{
   return "payment complete";
}

    /**============  payment success page ========= */
    public function payment_success(){
        
        return view('instructor.pages.subscription.payment_success');
    }

}

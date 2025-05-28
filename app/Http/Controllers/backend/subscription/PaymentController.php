<?php

namespace App\Http\Controllers\backend\subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentGatewayFactory;
class PaymentController extends Controller
{
    
    public function initiatePayment()
    {
        $gateway = PaymentGatewayFactory::make();

        $paymentData = $gateway->createPaymentIntent(20); // 20 USD

        return response()->json([
            'clientSecret' => $paymentData['clientSecret'],
        ]);
    }



    /**============  payment success page ========= */
    // public function payment_success(){
        
    //     return view('instructor.pages.payment_success');
    // }

}

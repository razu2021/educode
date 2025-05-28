<?php
namespace App\Services\Payment;
use Illuminate\Http\Request;
interface  PaymentInterface{

    public function createPaymentIntent($amount);
   public function handleWebhook(Request $request); // এটা অবশ্যই লাগবে



}



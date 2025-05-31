<?php
namespace App\Services\Payment;
use Illuminate\Http\Request;
interface  PaymentInterface{

//public function createPaymentIntent($amount);

public function makePayment(array $data); // main method


public function handleWebhook(Request $request); // এটা অবশ্যই লাগবে

}



<?php
namespace App\Services\Payment;
use Illuminate\Http\Request;

interface  PaymentInterface{

public function createPaymentIntent($amount);  // use for stripe payment 
 
public function makePayment(array $data); // use for store payment info data 

public function handleWebhook(Request $request); // এটা অবশ্যই লাগবে  use for webhook request .. affter success 



}



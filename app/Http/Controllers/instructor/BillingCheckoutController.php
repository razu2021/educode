<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Services\Payment\PaymentGatewayFactory;
class BillingCheckoutController extends Controller
{
    
    /**========   instructor plan and price page ======= */

    public function instructor_plan_price(){
        $allplan = SubscriptionPlan::where('plan_for','instructor')->where('public_status',1)->limit(3)->get();
        return view('instructor.pages.subscription.instructor_plan',compact('allplan'));
    }

    /**========   instructor plan and price Checkout page ======= */

    public function instructor_plan_checkout($id,$slug){
        $gateway = PaymentGatewayFactory::make(); 
        $paymentData = $gateway->makePayment($amount); // $20
        $clientSecret = $paymentData['clientSecret'];
        $data = SubscriptionPlan::where('id',$id)->where('slug',$slug)->first();
        return view('instructor.pages.subscription.instructor_plan_checkout',compact('data','clientSecret'));
    }

























}

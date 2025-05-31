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

    public function instructor_plan_checkout($id, $slug)
    {
        $data = SubscriptionPlan::where('id', $id)->where('slug', $slug)->first(); // get plan actual data 

        if (!$data) {
            abort(404, "Subscription Plan not found");
        }

        $amount = $data->usd_price;  // get plan price in USD

        $gateway = PaymentGatewayFactory::make();  // get payment gateway instance

        $paymentData = $gateway->createPaymentIntent($amount);  // create payment intent

        $clientSecret = $paymentData['clientSecret'] ?? null;  // safely get clientSecret

        return view('instructor.pages.subscription.instructor_plan_checkout', compact('data', 'clientSecret'));
    }


























}

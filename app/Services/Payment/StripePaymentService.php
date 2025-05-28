<?php
namespace App\Services\Payment;


use App\Services\Payment\PaymentInterface;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class StripePaymentService implements PaymentInterface
{
    public function __construct()
    {
       Stripe::setApiKey(config('services.stripe.secret')); // ✅ এটা stripe এর গোপন key set করে
    }

    public function createPaymentIntent($amount)
    {
        // Stripe টাকা ধরে cent-এ, তাই 100 গুণ করতে হবে
        $intent = PaymentIntent::create([
            'amount' => $amount * 100,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        return [
            'clientSecret' => $intent->client_secret,
            'intentId' => $intent->id,
        ];
    }

    public function handleWebhook(Request $request)
    {
       
    }


}
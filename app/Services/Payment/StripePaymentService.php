<?php
namespace App\Services\Payment;


use App\Services\Payment\PaymentInterface;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Log;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;
use App\Http\Controllers\backend\subscription\PaymentController;
use Illuminate\Support\Facades\Auth;

class StripePaymentService implements PaymentInterface
{
    public function __construct()
    {
       Stripe::setApiKey(config('services.stripe.secret')); // ✅ এটা stripe এর গোপন key set করে
    }

    public function createPaymentIntent($plan_data)
    {
        try{

            // Stripe টাকা ধরে cent-এ, তাই 100 গুণ করতে হবে
            $amount = $plan_data->usd_price;
            $intent = PaymentIntent::create([
                'amount' => round($amount * 100),
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'metadata' =>[
                    'user_name' => auth::user()->name,
                    'user_id' => auth::user()->id,
                    'user_email' => auth::user()->email,
                    'plan_id'=> $plan_data->id,
                    'plan_for'=> $plan_data->plan_for,
                    'plan_name'=> $plan_data->name,
                    'plan_interval'=> $plan_data->interval,
                    'course_limit'=> $plan_data->course_limit,
                    'plan_slug'=> $plan_data->slug
                ]
            ]);

            return [
                'clientSecret' => $intent->client_secret,
                'intentId' => $intent->id,
            ];
        }catch(\Exception $e){
             throw new \Exception("Stripe PaymentIntent creation failed: " . $e->getMessage());
        }


    }
    



    public function makePayment(array $data){
      
    }




    public function handleWebhook(Request $request)
    {
        $payload = file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];

        $secret = config('services.stripe.webhook_secret'); // .env file থেকে নেওয়া

        try{

            $event = Webhook::constructEvent($payload,$sig_header,$secret);

            
            switch($event->type){
                case 'payment_intent.succeeded':
                case 'charge.succeeded':
                    (new PaymentController)->handleSuccess($event->data->object);
                    break;

                    default:
                    Log::info("Unhandled event type: {$event->type}");
                    Log::info("👉 Received Stripe event: {$event->type}");

            }



        }catch(\UnexpectedValueException $e){
            Log::error(" Invalid payload: " . $e->getMessage());
            return response()->json(['error' => 'Invalid payload'], 400);
        }catch(SignatureVerificationException $e){
            Log::error("🔐 Stripe signature verification failed: " . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 400);
        }
        
    }


}
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


class StripePaymentService implements PaymentInterface
{
    public function __construct()
    {
       Stripe::setApiKey(config('services.stripe.secret')); // ✅ এটা stripe এর গোপন key set করে
    }

    public function createPaymentIntent($amount)
    {


        try{

            // Stripe টাকা ধরে cent-এ, তাই 100 গুণ করতে হবে
            $intent = PaymentIntent::create([
                'amount' => round($amount * 100),
                'currency' => 'usd',
                'payment_method_types' => ['card'],
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

            if ($event->type === 'payment_intent.succeeded') {
                return "payment data save  done ";
            }

            switch($event->type){
                case 'payment_intent.succeeded':
                    (new PaymentController)->handleSuccess($event->data->object);
                    break;

                    default:
                    Log::info("Unhandled event type: {$event->type}");

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
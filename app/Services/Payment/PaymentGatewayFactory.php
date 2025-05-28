<?php 

namespace App\Services\Payment;

use App\Services\payment\StripePaymentService;  // add this line if class is in this namespace
use App\Services\payment\PaymentInterface;

class PaymentGatewayFactory {

    public static function make(): PaymentInterface
    {
        $gateway = config('payment.active_gateway'); // 'stripe', 'paypal', etc.

        return match ($gateway) {
            'stripe' => new StripePaymentService(),
            default => throw new \Exception("Unsupported Payment Gateway"),
        };

    }

}

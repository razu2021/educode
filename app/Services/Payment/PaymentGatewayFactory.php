<?php 

namespace App\Services\Payment;

use App\Services\Payment\StripePaymentService;
use App\Services\Payment\SSLCommerzPaymentService;
use App\Services\Payment\PaymentInterface;

class PaymentGatewayFactory {

    public static function make(): PaymentInterface
    {
        $gateway = config('payment.active_gateway'); // 'stripe', 'paypal', etc.

        return match ($gateway) {
            'sslcommerz' => new SSLCommerzPaymentService(),
            'stripe' => new StripePaymentService(),
            default => throw new \Exception("Unsupported Payment Gateway"),
        };

    }

}

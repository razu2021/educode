<?php

use App\Http\Controllers\backend\subscription\PaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('stripe/webhook', [PaymentController::class, 'handle_webhook_request'])->withoutMiddleware(['web', 'api']);  // this is webhook route for stripe 
Route::post('/sslcommerz/ipn', [PaymentController::class, 'handleIpn']);
Route::controller(PaymentController::class)->group(function() {
    Route::match(['get', 'post'], '/payment/success/url', 'ssl_paymentSuccess')->name('ssl_payment.success');
    Route::match(['get', 'post'], '/payment/fail/url', 'ssl_paymentFail')->name('ssl_payment.fail');
    Route::match(['get', 'post'], '/payment/cancel/url', 'ssl_paymentCancel')->name('ssl_payment.cancel');
});






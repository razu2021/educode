<?php

use App\Http\Controllers\backend\subscription\PaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::post('stripe/webhook', [PaymentController::class, 'handle_webhook_request'])->withoutMiddleware(['web', 'api']);;  // this is webhook route for stripe 







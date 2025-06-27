<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;


class VerifyCsrfToken extends Middleware
{
    

    protected $except = [
        'stripe/webhook', // 👈 Stripe CLI এই URL এ POST করবে
         'sslcommerz/ipn', // ⛔ এই route এ CSRF লাগবে না
    ];
  


}

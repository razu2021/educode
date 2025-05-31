<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\EmailSetup;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;

class EmailConfigMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    



    public function handle(Request $request, Closure $next): Response
    {
        $mail = EmailSetup::where('public_status',1)->first();

        if($mail){
            Config::set('mail.default', $mail->mailer);
            Config::set('mail.mailers.smtp.host', $mail->host);
            Config::set('mail.mailers.smtp.port', $mail->port);
            Config::set('mail.mailers.smtp.username', $mail->username);
            Config::set('mail.mailers.smtp.password', $mail->password); // যদি encrypt করা থাকে, তাহলে decrypt() করুন
            Config::set('mail.mailers.smtp.encryption', $mail->encryption);

            Config::set('mail.from.address', $mail->from_address);
            Config::set('mail.from.name', $mail->from_name);
        }

      

        return $next($request);
    }
}

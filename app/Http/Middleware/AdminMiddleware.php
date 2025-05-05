<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

       if(!Auth::guard('admin')->check()){
            return redirect()->route('admin.login');
       };
       
     // If user is logged in as admin, we will set a custom session variable to identify it
     session(['guard' => 'admin']);  // Optionally set a session key for guard


        return $next($request);
    }
}

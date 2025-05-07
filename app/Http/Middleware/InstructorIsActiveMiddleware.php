<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InstructorIsActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        /**----  check user is logedin or not ------ */
        if(!Auth::check()){
            return redirect()->route('login');
        }

        /**
         * --- check the user actual role 
         */
        $user_role = $request->user()->role; 

        /**
         * ----- check the role with condition 
         */
        if( $user_role === 2){
            return $next($request);
            
        }

        abort(403 , 'Unauthorized action.'); // if the condition is false return redirect action 
        
    }
}

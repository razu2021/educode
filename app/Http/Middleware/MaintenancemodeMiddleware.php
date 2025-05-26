<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\MaintenanceMode;
class MaintenancemodeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    
        $maintenancemode = MaintenanceMode::where('public_status',1)->first();
        $maintenancemode_header = MaintenanceMode::where('public_status',2)->first();


        if($maintenancemode && $maintenancemode->public_status === 1){

               // যদি রিকোয়েস্টের URL admin দিয়ে শুরু না হয় এবং user লগিন করা না থাকে
            if (!str_starts_with($request->path(), 'admin')) {
                return response()->view('backend.setting.maintenancemode.maintenance',compact('maintenancemode'));
            }
        }elseif($maintenancemode_header && $maintenancemode_header->public_status === 2){
            view()->share('maintenancemode', $maintenancemode_header);

        }

        return $next($request);
    }
}

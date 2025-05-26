<?php

namespace App\Listeners\user;

use App\Events\user\UserRegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\TimeZoneLog;

class UserRegisterListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisterEvent $event): void
    {
        TimeZoneLog::create([
           'user_id'    => $event->user->id,
            'ip_address' => $event->ipAddress,
            'timezone'   => $event->timezone,
            'login_at'  => $event->loginTime,
        ]);
    }
}

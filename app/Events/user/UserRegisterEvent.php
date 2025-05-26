<?php

namespace App\Events\user;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegisterEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user;
    public $ipAddress;
    public $timezone;
    public $loginTime;
    







    /**
     * Create a new event instance.
     */
    public function __construct($user,$ipAddress,$timezone,$loginTime)
    {
        $this->user = $user;
        $this->ipAddress = $ipAddress;
        $this->timezone = $timezone;
        $this->loginTime = $loginTime;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

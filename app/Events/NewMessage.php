<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Support\Facades\Log;
class NewMessage  implements ShouldBroadcast
{
use Dispatchable, InteractsWithSockets, SerializesModels ;

    public $message;
    public $sender;

    public function __construct($message, $sender)
    {
        $this->message = $message;
        $this->sender = $sender;
    }

    public function broadcastOn() :PrivateChannel
    {
        return new PrivateChannel('chat.'.$this->message->receiver_id);
    }

    public function broadcastWith(): array
    {
        
        return [
            'message' => [
                'text' => $this->message->text,
                'sender_id' => $this->message->sender_id,
                'receiver_id' => $this->message->receiver_id,
                'time' => $this->message->created_at->format('H:i'),
            ],
            'sender' => [
                'name' => $this->sender->name,
                'avatar' => $this->sender->avatar ?? null
            ]
        ];
    }
}

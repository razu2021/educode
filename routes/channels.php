<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
   
    return true;
});
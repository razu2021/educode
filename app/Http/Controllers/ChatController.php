<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class ChatController extends Controller
{

public function send(Request $request)
{
    dd($request);
    $id= Auth::user()->id;
    $message = Message::create([
        'sender_id' => $id,
        'receiver_id' => $request->receiver_id,
        'text' => $request->text,
    ]);

    broadcast(new NewMessage($message, $id))->toOthers();

    return response()->json(['status' => true]);
}



///--------------------



public function index($userId)
{

    $authUser = Auth::user();

    $user = User::findOrFail($userId); // যাকে মেসেজ দিতে চায়

    // আগের মেসেজগুলো
    $messages = Message::where(function($q) use ($user){
        $q->where('sender_id', Auth::id())
          ->where('receiver_id', $user->id);
    })->orWhere(function($q) use ($user){
        $q->where('sender_id', $user->id)
          ->where('receiver_id', Auth::id());
    })->orderBy('created_at')->get();

    // চ্যাট ইউজার লিস্ট (Role অনুযায়ী filtered)
    if ($authUser->role == 0) {
        // Student - যেসব instructor কে মেসেজ করেছে
        $chatUsers = Message::where('sender_id', $authUser->id)
            ->with('receiver')
            ->get()
            ->pluck('receiver')
            ->unique('id');
    } elseif ($authUser->role == 1) {
        // Instructor - যেসব student মেসেজ পাঠিয়েছে
        $chatUsers = Message::where('receiver_id', $authUser->id)
            ->with('sender')
            ->get()
            ->pluck('sender')
            ->unique('id');
    } else {
        $chatUsers = collect(); // অন্য কারো জন্য খালি list
    }

    return view('chat.index', [
        'receiver' => $user,
        'messages' => $messages,
        'users' => $chatUsers,
    ]);
}



public function chatUsers()
{
    $authUser = Auth::user();

    if ($authUser->role === 0) {
        // Student - তারা যাদের সাথে চ্যাট করেছে (instructors)
        $users = Message::where('sender_id', $authUser->id)
            ->with('receiver')
            ->get()
            ->pluck('receiver')
            ->unique('id');
    } elseif ($authUser->role == 1) {
        // Instructor - তাদেরকে যেসব student message পাঠিয়েছে
        $users = Message::where('receiver_id', $authUser->id)
            ->with('sender')
            ->get()
            ->pluck('sender')
            ->unique('id');
    } else {
        $users = collect(); // অন্য কেউ হলে খালি list
    }



    return view('chat.index', compact('users'));
}


}

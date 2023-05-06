<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages(User $friend)
    {
        $messages = Message::where([
            ['from_user', auth()->id()],
            ['to_user', $friend->id],
        ])->orWhere([
            ['from_user', $friend->id],
            ['to_user', auth()->id()],
        ])->orderBy('created_at')->get();

        return view('messages.chat', compact('friend', 'messages'));
    }

    public function sendMessage(Request $request, User $friend)
    {
        $data = $request->validate([
            'message' => 'required|string',
        ]);

        $message = new Message;
        $message->from_user = auth()->id();
        $message->to_user = $friend->id;
        $message->message = $data['message'];
        $message->save();

        return back();
    }
    public function deleteMessage(User $friend, Message $message)
    {
        $message->delete();

      return redirect()->route('messages.chat', ['friend'=>$friend]);

    }
}

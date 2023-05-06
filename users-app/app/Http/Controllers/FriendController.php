<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $friends = User::find(auth()->user()->id)->myFriends;

        return view('friends.index', ['friends'=>$friends]);
    }
    public function sendFriendRequest(User $user)
    {
        $user->friends()->sync(auth()->user());

       return back();
    }

    public function reject(User $user)
    {
        auth()->user()->friends()->detach($user->id);

        return back();
    }

    public function accept(User $user)
    {
        auth()->user()->friends()->updateExistingPivot($user->id, [
            'status' => 'accepted',
        ]);

        $user->friends()->syncWithoutDetaching([auth()->id() => [
            'status' => 'accepted'
        ]]);

        return back();
    }

    public function delete(User $user)
    {
        auth()->user()->friends()->detach($user->id);

        $user->friends()->detach(auth()->id());

        return back();
    }

    public function deleteRequest(User $user)
    {
        $user->checkFriendRequests()->detach(auth()->user());

        return back();
    }


}

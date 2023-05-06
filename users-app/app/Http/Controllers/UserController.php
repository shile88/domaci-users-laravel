<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        $users = User::where('isAdmin', '!=', 1)->where('id', '!=', $id)->get();
        $requests = auth()->user()->friendRequests()->pluck('user_id')->toArray();
        $requestsToAccept = auth()->user()->checkFriendRequests()->pluck('friend_id')->toArray();
        $myFriends = auth()->user()->myFriends()->pluck('friend_id')->toArray();

        return view('users.index', [
            'users'=> $users,
            'requests'=>$requests,
            'requestsToAccept'=>$requestsToAccept,
            'myFriends'=>$myFriends]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::query()->create($request->validated());

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //$user = User::query()->where('id', '=', $id)->first();
        return view('users.edit', ['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($request->filled('password')) {
            User::find($user->id)->update($request->validated());
        } else {
            User::find($user->id)->update(Arr::except($request->validated(), 'password'));
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}

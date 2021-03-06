<?php

namespace Chatty\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Chatty\Http\Requests;
use Chatty\Models\User;
use Chatty\Http\Controllers\Controller;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();

        return view('friends.index')->with('friends', $friends)->with('requests', $requests);
    }

    public function getAdd($username){
        $user = User::where('username', $username)->first();
        if(!$user){
            return redirect()->route('home')->with('info', 'That user could not be found');
        }
        if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())){
            return redirect()->route('profile.index', ['username' => $user->username])->with('info', 'Friend request already pending.');
        }

        if(Auth::user()->isFriendsWith($user)){
            return redirect()->route('profile.index', ['username' => $user->username])->with('info', 'You are already friends.');
        }

        Auth::user()->addFriend($user);
        return redirect()->route('profile.index', ['username' => $user->username])->with('info', 'Friend request sent.');
    }
}


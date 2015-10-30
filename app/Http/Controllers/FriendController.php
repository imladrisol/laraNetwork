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


}

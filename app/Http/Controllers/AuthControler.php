<?php

namespace Chatty\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Chatty\Http\Requests;
use Chatty\Http\Controllers\Controller;
use Chatty\Models\User;
class AuthControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignup()
    {
        return view('auth.signup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postSignup(Request $request)
    {
        //dd($request); // stop and dump
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:6|alpha_num',
        ]);
        User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()
            ->route('home')
            ->with('info', 'Your account has been created and you can sign in.');
    }

    public function getSignin(){
        return view('auth.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if(!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){
            return redirect()->back()->with('info', 'Could not sign you in with those details.');
        }

        return redirect()
            ->route('home')
            ->with('info', 'You are now signed in.');
    }

    public function getSignout(){
        Auth::logout();
        return redirect()->route('home');
    }
}

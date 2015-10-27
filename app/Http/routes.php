<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
 * Home
 */
Route::get('/', [
    'uses' => '\Chatty\Http\Controllers\HomeController@index',
    'as' => 'home',
]);

/**
 * Sign up
 */
Route::get('/signup', [
    'uses' => '\Chatty\Http\Controllers\AuthControler@getSignup',
    'as' => 'auth.signup',
]);
Route::post('/signup', [
    'uses' => '\Chatty\Http\Controllers\AuthControler@postSignup',
]);

/**
 * Sign out
 */
Route::get('/signout', [
    'uses' => '\Chatty\Http\Controllers\AuthControler@getSignout',
    'as' => 'auth.signout',
]);

/**
 * Sign in
 */
Route::get('/signin', [
    'uses' => '\Chatty\Http\Controllers\AuthControler@getSignin',
    'as' => 'auth.signin',
]);

Route::post('/signin', [
    'uses' => '\Chatty\Http\Controllers\AuthControler@postSignin',
]);
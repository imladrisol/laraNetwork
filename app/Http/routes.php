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
    'middleware' => ['guest']
]);
Route::post('/signup', [
    'uses' => '\Chatty\Http\Controllers\AuthControler@postSignup',
    'middleware' => ['guest']
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
    'middleware' => ['guest']
]);

Route::post('/signin', [
    'uses' => '\Chatty\Http\Controllers\AuthControler@postSignin',
    'middleware' => ['guest']
]);

/**
 * Search
 */

Route::get('/search', [
    'uses' => '\Chatty\Http\Controllers\SearchController@getResults',
    'as' => 'search.results',
]);

/**
 * Profile
 */

Route::get('/user/{username}',[
    'uses' => '\Chatty\Http\Controllers\ProfileController@getProfile',
    'as' => 'profile.index',
]);

Route::get('/profile/edit', [
    'uses' => '\Chatty\Http\Controllers\ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth']
]);
Route::post('/profile/edit', [
    'uses' => '\Chatty\Http\Controllers\ProfileController@postEdit',
    'middleware' => ['auth']
]);

/**
 * Friends
 */

Route::get('/friends',[
   'uses' => '\Chatty\Http\Controllers\FriendController@getIndex',
    'as' => 'friends.index',
    'middleware' => ['auth']
]);

Route::get('/friends/add/{username}',[
    'uses' => '\Chatty\Http\Controllers\FriendController@getAdd',
    'as' => 'friends.add',
    'middleware' => ['auth']
]);
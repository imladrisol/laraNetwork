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
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', '\App\Http\Controllers\Api\Auth\RegisterController@register');
Route::post('login', '\App\Http\Controllers\Api\Auth\LoginController@login');
Route::post('refresh', '\App\Http\Controllers\Api\Auth\LoginController@refresh');
// Route::post('social_auth', '\App\Http\Controllers\Api\Auth\SocialAuthController@socialAuth');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function() {
    return App\User::all();
});
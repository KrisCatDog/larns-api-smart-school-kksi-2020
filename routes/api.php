<?php


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

Route::post('login', 'Auth\AuthAPIController@login');
Route::post('register', 'Auth\AuthAPIController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('user', function () {
        return request()->user();
    });
    Route::post('logout', 'Auth\AuthAPIController@logout');
});

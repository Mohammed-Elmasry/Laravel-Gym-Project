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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', 'UsersApiController@index');
Route::get('/users/{user}', 'UsersApiController@show');
Route::get('/users/{user}/edit', 'UsersApiController@edit');
Route::post('/users','UsersApiController@store');
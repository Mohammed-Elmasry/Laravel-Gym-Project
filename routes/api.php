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
Auth::routes(['verify' => true]);
Route::get('/users', 'UsersApiController@index'); //->middleware('auth:api');
Route::get('/users/{user}', 'UsersApiController@show')->middleware('verified');
Route::get('/users/{user}/edit', 'UsersApiController@edit');
Route::post('/users', 'UsersApiController@store');
Route::put('/users/{user}', 'UsersApiController@update')->middleware('auth:api');
Route::post('/users/attend', 'UsersApiController@attend_session');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function ($router) {
    Route::post('/login', 'UsersApiController@login'); //->middleware('verified');
    Route::post('/logout', 'UsersApiController@logout');
    Route::post('/refresh', 'UsersApiController@refresh');
    Route::post('me', 'UsersApiController@me');
});

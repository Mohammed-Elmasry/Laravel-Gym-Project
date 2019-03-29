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

Route::post('/sessions/attend', 'UsersApiController@attend_session');
Route::post('/sessions/remaining', 'UsersApiController@get_remaining');
Route::post('/sessions/history','UsersApiController@get_history');
Route::post('/users', 'UsersApiController@store');
Route::get('/users/{user}', 'UsersApiController@show')->middleware('verified');
Auth::routes(['verify' => true]);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function ($router) {
    Route::get('/users', 'UsersApiController@index'); //->middleware('auth:api');
    Route::get('/users/{user}/edit', 'UsersApiController@edit');
    Route::put('/users/{user}', 'UsersApiController@update');

    Route::post('/login', 'UsersApiController@login'); //->middleware('verified');
    Route::post('/logout', 'UsersApiController@logout');
    Route::post('/refresh', 'UsersApiController@refresh');
    Route::post('me', 'UsersApiController@me');
});

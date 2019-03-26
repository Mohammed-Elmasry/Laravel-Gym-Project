<?php

/*
|----------------------------------------Route::get('/posts/create', 'PostsController@create')
->name('posts.create');----------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/coaches', 'CoachesController@index')
->name('coaches.index');

Route::get('/coaches/create', 'CoachesController@create')
->name('coaches.create');

Route::post('/coaches', 'CoachesController@store')
->name('coaches.store');

Route::get('/coaches/{coach}', 'CoachesController@show')
->name('coaches.show');
// --------------------------
Route ::get('/citymanager', 'CityManagerController@index')
->name('citymanager.index');

Route ::get('citymanager/create', 'CityManagerController@create')
->name('citymanager.create');

Route ::post('/citymanager', 'CityManagerController@store')
->name('citymanager.store');
//---------------------------
Route ::get('/gymmanager', 'GymManagerController@index')
->name('gymmanager.index');

Route ::get('gymmanager/create', 'GymManagerController@create')
->name('gymmanager.create');

Route ::post('/gymmanager', 'GymManagerController@store')
->name('gymmanager.store');
//---------------------------
 Route ::get('/gym', 'GymsController@index')
->name('gym.index');

Route ::get('/gym/get_gymdata', 'GymsController@get_gymdata');

Route ::get('/gym/create', 'GymsController@create')
->name('gym.create');

Route ::post('/gym', 'GymsController@store')
->name('gym.store');

Route ::get('/gym/{gym}/edit', 'GymsController@edit')
->name('gym.edit');

Route ::patch('/gym/{gym}', 'GymsController@update')
->name('gym.update');

Route::DELETE('/gym/{gym}', 'GymsController@destroy')
->name('gym.destroy');

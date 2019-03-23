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

Route::post('/coaches','CoachesController@store')
->name('coaches.store');

Route::get('/coaches/{coach}','CoachesController@show')
->name('coaches.show');


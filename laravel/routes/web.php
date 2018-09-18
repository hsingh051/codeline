<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
	return redirect('/films');
});

Route::get('/films', function () {
    return view('films');
});

Route::get('/films/{slug}', 'HomeController@getFilm');

Auth::routes();

Route::get('/home', function () {
    //return view('welcome');
	return redirect('/films');
});
Route::get('film/create', 'HomeController@addFilm')->middleware('auth');
Route::post('film/add', 'HomeController@saveFilm')->middleware('auth');
Route::post('comment/add', 'HomeController@saveComment')->middleware('auth');
//Route::get('/home', 'HomeController@index')->name('home');

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
 
Route::get('/login', 'AuthController@loginForm')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::prefix('users')->group(function(){ 
	Route::get('/add', 'AuthController@register')->name('register')->middleware('auth');
	Route::post('/add', 'AuthController@registerUser');
	Route::get('/', 'AuthController@index')->name('users');
});

Route::resource('tracks', 'TrackController');
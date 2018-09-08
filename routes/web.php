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

Route::get('/','DashboardController@index')->name('home')->middleware('auth');

Route::get('/dashboard','DashboardController@index')->name('dashboard')->middleware('auth');

Route::prefix('users')->group(function(){ 
	Route::get('/add', 'AuthController@register')->name('register')->middleware('auth');
	Route::post('/add', 'AuthController@registerUser');
	Route::get('/', 'AuthController@index')->name('users');
});

Route::resource('tracks', 'TrackController');

Route::prefix('people')->group(function(){
	Route::get('/add', 'PeopleController@add')->name('add_people')->middleware('auth');
	Route::post('/store', 'PeopleController@store')->name('store_people')->middleware('auth');
	Route::get('/', 'PeopleController@index')->name('view_people')->middleware('auth');
	Route::post('/ajax-search', 'PeopleController@ajax')->middleware('auth');
});

Route::prefix('seminars')->group(function(){
	Route::get('/', 'SeminarController@attendees')->name('attendees')->middleware('auth');
	Route::get('/add', 'SeminarController@insert')->name('insert_attendees')->middleware('auth');
	Route::post('/add', 'SeminarController@store')->name('store_attendees')->middleware('auth');
	Route::post('/remove', 'SeminarController@remove')->name('delete_seminar')->middleware('auth');
});
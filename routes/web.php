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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/profile', 'UserController@profile')->name('profile');

	Route::resource('blogs', 'BlogController');

	Route::group(['prefix'=>'api'], function(){
		Route::get('/all-blogs', 'BlogController@all');
		Route::get('/blogs/{id}', 'BlogController@getBlog');
	});
});
Route::get('sample', function(){
	return view('sample');
});

Route::group(['prefix'=>'admin'], function(){
	Route::get('/index', function(){
		return 'admin index';
	});
	Route::get('/login', function(){
		return 'ADMIN LOGIN';
	});
});

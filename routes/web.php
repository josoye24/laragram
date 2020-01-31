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



Auth::routes();


Route::get('mail', function () {
    return new App\Mail\NewWelcomeMail;
});


Route::get('/', 'PostsController@index')->name('home');
Route::get('/p/create', 'PostsController@create');
Route::post('/p/create', 'PostsController@store');
Route::get('/p/{slug}', 'PostsController@show');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::put('profile/edit', ['as' => 'profile.edit.info', 'uses' => 'ProfileController@info']);
});

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::post('follow/{user}', 'FollowsController@store');

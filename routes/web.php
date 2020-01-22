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


Route::get('mail', function () {
    return new App\Mail\NewWelcomeMail;
});



Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}/edit', 'ProfilesController@update')->name('profile.update');

Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p/create', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');



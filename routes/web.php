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
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/', 'PublicController@index')->name('index');

Route::prefix('profile')->group(function(){
	Route::get('/', 'ProfileController@index')->name('profile');
	Route::post('/save', 'ProfileController@save')->name('profile-save');
});

//examples
Route::view('/example/modal','example.modal');
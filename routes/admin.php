<?php

Route::get('/','UserController@index');
Route::get('users','UserController@users')->name('users');
Route::get('user/create','UserController@create')->name('user-create');
Route::get('user/{id}/edit','UserController@edit')->name('user-edit');
Route::get('user/{id}/delete','UserController@delete')->name('user-delete');
Route::post('user/save','UserController@save')->name('user-save');

Route::get('settings','SettingController@index')->name('settings');
Route::post('settings/save','SettingController@save')->name('settings-save');
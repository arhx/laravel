<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/',[UserController::class,'index'])->name('index');
Route::get('users',[UserController::class,'users'])->name('users');
Route::get('user/create',[UserController::class,'create'])->name('user-create');
Route::get('user/{id}/edit',[UserController::class,'edit'])->name('user-edit');
Route::get('user/{id}/delete',[UserController::class,'delete'])->name('user-delete');
Route::post('user/save',[UserController::class,'save'])->name('user-save');

Route::get('settings',[SettingController::class,'index'])->name('settings');
Route::post('settings/save',[SettingController::class,'save'])->name('settings-save');

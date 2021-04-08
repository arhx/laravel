<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::get('/', [App\Http\Controllers\PublicController::class,'index'])->name('index');

Route::prefix('profile')->group(function(){
    Route::get('/', [App\Http\Controllers\ProfileController::class,'index'])->name('profile');
    Route::post('/save', [App\Http\Controllers\ProfileController::class,'save'])->name('profile-save');
});

//examples
Route::view('/example/modal','example.modal');


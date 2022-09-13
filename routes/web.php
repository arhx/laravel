<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\PublicController::class,'index'])->name('index');

Route::prefix('profile')->group(function(){
    Route::get('/', [App\Http\Controllers\ProfileController::class,'index'])->name('profile');
    Route::post('/save', [App\Http\Controllers\ProfileController::class,'save'])->name('profile-save');
});

//examples
Route::view('/example/modal','example.modal');

require __DIR__.'/auth.php';

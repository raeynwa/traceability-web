<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('store', [App\Http\Controllers\LoginController::class, 'store'])->name('auth.login.store');
    Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('auth.logout.store');
});

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('login')->group(function () {
    Route::get('', [LoginController::class, 'index'])->name('login');
    Route::post('store', [LoginController::class, 'store'])->name('auth.login.store');
    Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout.store');
});

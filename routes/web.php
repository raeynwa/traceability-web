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
    Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('store', [App\Http\Controllers\LoginController::class, 'store'])->name('auth.login.store');
    Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('auth.logout.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    Route::prefix('master')->group(function () {
        Route::prefix('produk')->group(function () {
            Route::get('/', [App\Http\Controllers\ProdukController::class, 'index'])->name('master.produk.index');
            Route::post('/store', [App\Http\Controllers\ProdukController::class, 'store'])->name('master.produk.store');
            Route::get('/edit', [App\Http\Controllers\ProdukController::class, 'edit'])->name('master.produk.edit');
            Route::post('/update', [App\Http\Controllers\ProdukController::class, 'update'])->name('master.produk.update');
            Route::post('/delete', [App\Http\Controllers\ProdukController::class, 'delete'])->name('master.produk.delete');
        });
    });
});
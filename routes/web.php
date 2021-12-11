<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('auth.')->group(function () {
    Route::match(array('get', 'post'), '/', [AuthController::class, 'login'])->name('login');
    Route::match(array('get', 'post'), 'logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [AppController::class, 'dashboard'])->name('dashboard');
});

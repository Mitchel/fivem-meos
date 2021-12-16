<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('auth.')->group(function () {
    Route::match(array('get', 'post'), '/', [AuthController::class, 'login'])->name('login');
    Route::match(array('get', 'post'), 'logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/')->name('app.')->group(function () {
    Route::get('dashboard', [AppController::class, 'dashboard'])->name('dashboard');
});

Route::prefix('/')->name('profiles.')->group(function () {
    Route::get('profiles', [AppController::class, 'profiles'])->name('overview');
    Route::get('profiles/{citizen_number}', [AppController::class, 'profilesView'])->name('view');
    Route::match(array('get', 'post'), 'profiles/create', [AppController::class, 'profilesCreate'])->name('create');
    Route::match(array('get', 'post'), 'profiles/edit/{citizen_number}', [AppController::class, 'profilesEdit'])->name('edit');
    Route::match(array('get', 'post'), 'profiles/delete/{citizen_number}', [AppController::class, 'profilesDelete'])->name('delete');
});

Route::prefix('/')->name('reports.')->group(function () {
    Route::get('reports', [AppController::class, 'reports'])->name('overview');
    Route::get('reports/{report_number}', [AppController::class, 'reportsView'])->name('view');
    Route::match(array('get', 'post'), 'reports/create', [AppController::class, 'reportsCreate'])->name('create');
    Route::match(array('get', 'post'), 'reports/edit/{report_number}', [AppController::class, 'reportsEdit'])->name('edit');
    Route::match(array('get', 'post'), 'reports/delete/{report_number}', [AppController::class, 'reportsDelete'])->name('delete');
});

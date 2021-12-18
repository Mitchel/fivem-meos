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
    Route::get('statics', [AppController::class, 'statics'])->name('statics');
    Route::get('profile', [AppController::class, 'profile'])->name('profile');
});

Route::prefix('/')->name('supervisor.')->group(function () {
    Route::get('laws', [AppController::class, 'laws'])->name('laws');
    Route::get('colleagues', [AppController::class, 'colleagues'])->name('colleagues');
    Route::get('colleagues/{citizen_number}', [AppController::class, 'colleaguesView'])->name('view');
});

Route::prefix('/')->name('warrants.')->group(function () {
    Route::get('warrants', [AppController::class, 'warrantsOverview'])->name('overview');
});

Route::prefix('/')->name('detective.')->group(function () {
    Route::get('detective', [AppController::class, 'detective'])->name('overview');
});

Route::prefix('/')->name('profiles.')->group(function () {
    Route::match(array('get', 'post'), 'profiles', [AppController::class, 'profiles'])->name('overview');
    Route::get('profiles/{citizen_number}', [AppController::class, 'profilesView'])->name('view');
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

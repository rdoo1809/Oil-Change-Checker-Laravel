<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\VehiklController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::controller(CarController::class)->group(function () {
    Route::get('/', 'index')->name('cars.index');
    Route::post('/add-car', 'store')->name('cars.store');
});

Route::controller(VehiklController::class)->group(function () {

    Route::post('/check', 'store')
        ->name('vehikl.store')
        ->withoutMiddleware([VerifyCsrfToken::class]);

    Route::get('/result/{vehikl}', 'show')
        ->name('vehikl.show')
        ->withoutMiddleware([VerifyCsrfToken::class]);

    Route::get('/history', 'index')
        ->name('vehikl.index')
        ->withoutMiddleware([VerifyCsrfToken::class]);
});

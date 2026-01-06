<?php

use App\Http\Controllers\VehiklController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
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

<?php

use App\Http\Controllers\VehiklController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::controller(VehiklController::class)->group(function () {
    Route::post('/check', 'store')->name('vehikl.store');
    Route::get('/result/{vehikl}', 'show')->name('vehikl.show');
});

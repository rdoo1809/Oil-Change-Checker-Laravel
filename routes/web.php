<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehiklController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Route::controller(CarController::class)->group(function () {
//    Route::get('/', 'index')->name('cars.index');
//    Route::post('/add-car', 'store')->name('cars.store');
//});
//
//Route::controller(VehiklController::class)->group(function () {
//
//    Route::post('/check', 'store')
//        ->name('vehikl.store')
//        ->withoutMiddleware([VerifyCsrfToken::class]);
//
//    Route::get('/result/{vehikl}', 'show')
//        ->name('vehikl.show')
//        ->withoutMiddleware([VerifyCsrfToken::class]);
//
//    Route::get('/history', 'index')
//        ->name('vehikl.index')
//        ->withoutMiddleware([VerifyCsrfToken::class]);
//});

require __DIR__.'/auth.php';

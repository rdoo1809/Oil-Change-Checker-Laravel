<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehiklController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [CarController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
   Route::controller(VehiklController::class)->group(function () {
       Route::post('/check', 'store')->name('vehikl.store');
       Route::get('/result/{vehikl}', 'show')->name('vehikl.show');
       Route::get('/history', 'index')->name('vehikl.index');
   });
    Route::controller(CarController::class)->group(function () {
        Route::get('/cars', 'index')->name('cars.index');
        Route::post('/add-car', 'store')->name('cars.store');
        Route::get('/cars/{car}', 'show')->name('cars.show');
    });
});

require __DIR__ . '/auth.php';

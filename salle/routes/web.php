<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('index');
});

// Authentification Pages

Route::get('/register', [RegisteredUserController::class], 'create')
    ->middleware('guest')
    ->name('/register');

Route::post('/register', [RegisteredUserController::class], 'store')
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class], 'create')
    ->middleware('guest')
    ->name('/login');

Route::post('/login', [AuthenticatedSessionController::class], 'store')
    ->middleware('guest');



Route::get('/about', function () {
    return view('about');
});

Route::get('/classes', function () {
    return view('classes');
});

Route::get('/schedules', function () {
    return view('schedules');
});

Route::get('/contact', function () {
    return view('contact');
});
// Authentification Controllers

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
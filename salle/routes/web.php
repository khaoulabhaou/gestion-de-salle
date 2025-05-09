<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

// --------------------------------------------
// Guest Routes (register, login, forgot password)
// --------------------------------------------

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');    
    
});

// --------------------------------------------
// Email Verification
// --------------------------------------------

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

// --------------------------------------------
// Profile
// --------------------------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// --------------------------------------------
// Password Confirmation & Update (for logged-in users)
// --------------------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --------------------------------------------
// Membership and Payment controller
// --------------------------------------------
Route::get('/membership', [MembershipController::class, 'index'])->name('membership');
Route::get('/payment/{membership}', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment/{membership}/process', [PaymentController::class, 'processPayment'])->name('payment.process');
// --------------------------------------------
// Public Views
// --------------------------------------------

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/about', fn () => view('about'));
Route::get('/classes', fn () => view('classes'));
Route::get('/schedules', fn () => view('schedules'));
Route::get('/trainers', fn () => view('trainers'));
Route::get('/contact', fn () => view('contact'));
// Route::get('/membership', fn() => view('membership'));

// Optional: If using Laravel Breeze or Jetstream
require __DIR__.'/auth.php';

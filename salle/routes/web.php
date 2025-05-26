<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cours\AjouterCours;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\Cours\Listscontroller;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\coache\CoacheController;
use App\Http\Controllers\cours\CatégorieController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\member\MemberController;

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
    // Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.adminProfile');
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
// Membership Routes
// --------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/membership', [MembershipController::class, 'index'])->name('membership');
    Route::get('cancel-membership', [MembershipController::class, 'cancelMembership'])->name('membership.cancel');
    Route::post('cancel-membership', [MembershipController::class, 'cancelMembershipSubmit'])->name('membership.cancel.submit');
    Route::get('upgrade-membership', [MembershipController::class, 'upgradeMembership'])->name('membership.upgrade');
    Route::post('upgrade-membership', [MembershipController::class, 'upgradeMembershipSubmit'])->name('membership.upgrade.submit');
    Route::post('subscribe', [MembershipController::class, 'subscribe'])->name('membership.subscribe');
    Route::get('/membership/info', [MembershipController::class, 'showMembershipInfo'])->name('membership.info');
});

// --------------------------------------------
// Payment Routes
// --------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/payment/{membership}', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/{membership}/process', [PaymentController::class, 'processPayment'])->name('payment.process');
});

// -------------------------------------------
// Contact Routes
// -------------------------------------------
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// --------------------------------------------
// Cours Routes
// --------------------------------------------
Route::middleware('auth','admin')->group( function() {
    Route::get('/cours/list-cours', [Listscontroller::class, 'index'])->name('list-cours');
    Route::get('/cours/ajouter', [AjouterCours::class, 'create'])->name('ajouter-cour');
    Route::post('/cours/ajouter', [AjouterCours::class, 'store'])->name('cours.store');
    Route::get('/cours/{id}/edit', [Listscontroller::class, 'edit'])->name('cours.edit');
    Route::put('/cours/{id}', [Listscontroller::class, 'update'])->name('cours.update');
    Route::delete('/cours/{id}', [Listscontroller::class, 'destroy'])->name('cours.destroy');
});

// --------------------------------------------
// Catégorie Routes
// --------------------------------------------
Route::middleware('auth','admin')->group(function() {
    Route::get('/cours/catégorie/ajouter-catégorie', [CatégorieController::class, 'create'])->name('categorie.catégorie-ajouter');
    Route::get('/cours/catégorie/catégorie-list', [CatégorieController::class, 'index'])->name('categorie.categorie-list');
    Route::post('/cours/catégorie/catégorie-list/ajouter-catégorie', [CatégorieController::class, 'store'])->name('categorie.store');
    Route::get('/cours/catégorie/catégorie-list/catégorie-détails/{id}',[CatégorieController::class, 'show'])->name('categorie-details');
    Route::delete('/cours/catégorie/catégorie-list/{id}', [CatégorieController::class, 'destroy'])->name('categorie-destroy');
    Route::get('/cours/catégorie/{id}/edit', [CatégorieController::class, 'edit'])->name('categorie-edit');
    Route::put('/cours/catégorie/{id}', [CatégorieController::class, 'update'])->name('categorie-update');
});

// --------------------------------------------
// Entraîneurs Routes
// --------------------------------------------
Route::middleware('auth', 'admin')->group(function() {
    Route::get('/coache/ajouter-coache', [CoacheController::class, 'create'])->name('coache.create');
    Route::post('/coache/ajouter-coache', [CoacheController::class, 'store'])->name('coache.store');
    Route::get('/coache/coache-list', [CoacheController::class, 'index'])->name('coache.index');
    Route::get('/coache/{id}/edit',[CoacheController::class, 'edit'])->name('coache.edit');
    Route::put('/coache/{id}',[CoacheController::class, 'update'])->name('coache.update');
    Route::delete('/coache/coache-destroy/{id}',[CoacheController::class, 'destroy'])->name('coache.destroy');
});

// --------------------------------------------
// Membres Routes
// --------------------------------------------
Route::middleware('auth', 'admin')->group(function() {
    Route::get('/membres/ajouter-membre', [MemberController::class, 'create'])->name('member.create');
});
// --------------------------------------------
// Public Views for User
// --------------------------------------------
Route::middleware('auth', 'user')->group(function (){
    Route::get('/', fn() => view('index'))->name('index');
    Route::get('/about', fn () => view('about'));
    Route::get('/classes', fn () => view('classes'));
    Route::get('/schedules', fn () => view('schedules'))->name('schedules');
    Route::get('/trainers', fn () => view('trainers'))->name('trainers');
    Route::get('/contact', fn () => view('contact'))->name('contact');    
});

// --------------------------------------------
// Public Views for Admin
// --------------------------------------------
Route::middleware('auth','admin')->group(function () {
    Route::get('/admin/dashboard', fn() => view('adminDashboard'))->name('admin-dashboard');
});

// Optional: If using Laravel Breeze or Jetstream
require __DIR__.'/auth.php';
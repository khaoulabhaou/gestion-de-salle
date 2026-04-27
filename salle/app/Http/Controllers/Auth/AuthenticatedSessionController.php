<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
<<<<<<< HEAD
 public function store(LoginRequest $request): RedirectResponse
{
=======
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }

    $request->session()->regenerate();

    // Redirect based on role
    $user = Auth::user();
    if ($user->role === 'admin') {
        return redirect()->intended('/admin/dashboard');
    }

    if ($user->role === 'coach') {
        return redirect('/coach/index');
    };

    return redirect()->intended('/');
>>>>>>> 25c5bbc (profile picture not showing)
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }

    $request->session()->regenerate();

    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    if ($user->role === 'coach') {
        return redirect('/coach/index');
    }

    return redirect('/');
}
}

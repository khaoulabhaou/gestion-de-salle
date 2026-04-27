<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserOnly
{
    public function handle($request, Closure $next)
    {
<<<<<<< HEAD
        if (Auth::check() && Auth::user()->role === 'user' or Auth::user()->role === '') {
            return $next($request);
        }

        abort(403);
=======
        if (!Auth::check()) {
            return redirect('/login');
        }
    
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }
    
        if (Auth::user()->role === 'user') {
            return $next($request);
        }
    
        return abort(403);
>>>>>>> 25c5bbc (profile picture not showing)
    }
}
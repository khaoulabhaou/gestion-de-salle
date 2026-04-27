<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        
        return abort(403); // or redirect()->route('home')
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserOnly
{
    public function handle($request, Closure $next)
    {
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
    }
}
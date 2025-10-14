<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // 🔹 arahkan sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($user->role === 'mekanik') {
                return redirect()->route('dashboard.mekanik');
            } else {
                return redirect()->route('dashboard.user');
            }
        }

        return $next($request);
    }
}

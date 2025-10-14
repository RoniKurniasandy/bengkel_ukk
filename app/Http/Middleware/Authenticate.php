<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Handle unauthenticated users.
     */
    protected function redirectTo($request): ?string
    {
        // Kalau user belum login, arahkan ke halaman login
        return $request->expectsJson() ? null : route('login');
    }
}

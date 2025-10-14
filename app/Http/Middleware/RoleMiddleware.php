<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Cek apakah user memiliki role tertentu.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Jika belum login atau role tidak cocok → tampilkan error 403
        if (!$user || !in_array($user->role, $roles)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}

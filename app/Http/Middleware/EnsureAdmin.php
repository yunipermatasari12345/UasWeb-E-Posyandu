<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureAdmin
{
    /**
     * Hanya izinkan user dengan role 'admin'.
     */
   // app/Http/Middleware/EnsureAdmin.php
public function handle($request, Closure $next)
{
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        // jika mau redirect ke /login daripada 403, pakai baris di bawah:
        // return redirect()->route('login');
        abort(403, 'Akses hanya untuk admin.');
    }
    return $next($request);
}

}

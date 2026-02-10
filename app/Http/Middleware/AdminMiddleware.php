<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN rolenya adalah admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, lempar error 403
        abort(403, 'Akses Ditolak! Anda bukan Admin.');
    }
}
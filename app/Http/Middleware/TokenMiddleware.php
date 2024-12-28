<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil header Authorization
        $authHeader = $request->header('Authorization');

        // Validasi token
        if (!$authHeader || $authHeader !== 'Bearer Nizar-Token') {
            return response()->json([
                'pesan' => 'Token tidak valid atau tidak disertakan.',
                'detail' => $authHeader ? "Diterima: {$authHeader}" : "Tidak ada token"
            ], 401);
        }

        return $next($request);
    }
}

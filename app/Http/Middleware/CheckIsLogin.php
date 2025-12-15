<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsLogin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403, 'anda perlu login.');

        }
        
        return $next($request);
    }
}

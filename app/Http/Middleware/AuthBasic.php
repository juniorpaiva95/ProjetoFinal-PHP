<?php

namespace App\Http\Middleware;

use Closure;

class AuthBasic
{

    public function handle($request, Closure $next)
    {
        return auth()->basic('login') ?: $next($request);
    }
}
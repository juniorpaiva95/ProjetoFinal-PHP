<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::guest()) {
            abort(403,'Acesso não permitido!!');
        }
        $permission = is_array($permission)
            ? $permission
            : explode('|', $permission);
        if (! Auth::user()->hasAnyPermission(...$permission)) {
            abort(403);
        }
        return $next($request);
    }
}


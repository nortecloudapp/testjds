<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminCheck
{
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        $userRoless = Auth::user()->roles->pluck('nombre_rol');
        if (!$userRoless->contains('admin')) {
            abort(403);
        }

        return $next($request);
    }
}

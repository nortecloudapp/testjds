<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AlumnoCheck
{

    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        $userRoless = Auth::user()->roles->pluck('nombre_rol');
        if (!$userRoless->contains('alumno')) {
            abort(403);
        }

        return $next($request);
    }
}

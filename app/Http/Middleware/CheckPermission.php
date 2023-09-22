<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $permission)
    {
        if (! Auth::user()->can($permission)) {
            Auth::logout();
            return redirect('/login')->withErrors(['No tienes permiso para realizar esta acción.']);
        }

        return $next($request);
    }
}

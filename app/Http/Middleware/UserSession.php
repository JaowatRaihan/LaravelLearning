<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'usergaurd')
    {
        if (!Auth::guard($guard)->check() && !$request->session()->has('sessionUser')) {
            return redirect('/')->with('error', 'Log in first for access.');
        }
        return $next($request);
    }
}

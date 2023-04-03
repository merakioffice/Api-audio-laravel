<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateApi
{
    public function handle($request, Closure $next)
    {
        if (! session()->has('token')){
            dd(session('token'));
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return $next($request);
    }
}

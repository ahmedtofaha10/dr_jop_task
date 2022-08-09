<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{

    public function handle(Request $request, Closure $next,$role)
    {
        if (auth()->user()->role == $role) {
            return $next($request);
        }
        return abort(403);
    }
}

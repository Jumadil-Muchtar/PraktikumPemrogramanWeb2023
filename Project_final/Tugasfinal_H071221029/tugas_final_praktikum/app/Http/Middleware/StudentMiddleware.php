<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    public function handle($request, Closure $next)
    {
        if(auth()->user() && auth()->user()->role == 'student') {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}

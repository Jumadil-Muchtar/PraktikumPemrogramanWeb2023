<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user has the 'admin' role
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Redirect or respond with an error for unauthorized access
        return redirect('/')->with('error', 'Unauthorized access');
    }
}

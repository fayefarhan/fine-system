<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToLogin
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Add the following line to redirect to the login page after logout
        return $response->header('Location', route('login'));
    }
}

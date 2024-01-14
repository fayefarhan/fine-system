<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->is_staff) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}

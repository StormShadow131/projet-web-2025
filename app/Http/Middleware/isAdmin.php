<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Checks if the user has the “admin” role
        if (auth()->user()->role !== 'admin') {
            // If not admin return, error
            abort(403);
        }
        // If admin, continue
        return $next($request);
    }

}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isStudent
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Checks if the user has the “student” role
        if (auth()->user()->role !== 'student') {
            // If not student, return error
            abort(403);
        }
        // If student, continue
        return $next($request);
    }

}

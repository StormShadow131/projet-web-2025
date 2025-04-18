<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isTeacher
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Checks if the user has the “teacher” role
        if (auth()->user()->role !== 'teacher') {
            // If not teacher, return error
            abort(403);
        }
        // If teacher, continue
        return $next($request);
    }
}

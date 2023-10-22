<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $userType): Response
{
    // Check if the authenticated user's type matches the required type
    if (auth()->user()->type == $userType) {
        // If so, proceed with the next request handler
        return $next($request);
    }

    // Otherwise, return a forbidden HTTP response
    return new Response('Unauthorized', 403);
}
}

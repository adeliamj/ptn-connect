<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->role == 1) {
            return $next($request);
        }

        if ($user->role == 2) {
            return redirect('/user');
        }

        // If the user's role is not 1 or 2, you might want to handle it accordingly.
        // For example, you can return a 403 Forbidden response.
        return response('Forbidden', 403);
    }
}

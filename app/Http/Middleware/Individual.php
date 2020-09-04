<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Individual
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Guest user could not access this route
        // 401 Unauthorized
        if (!Auth::check()) {
            return abort(401);
        }

        // Only the creator could update, delete his content
        if (Auth::user()->account_type == 'individual') {
            return $next($request);
        }
        return abort(401);
    }
}

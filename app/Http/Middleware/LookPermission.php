<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Look;

class LookPermission
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

        $look = Look::findorfail($request->id);
        $profile_id = Auth::user()->id;

        // Only the creator could update, delete his content
        if ($look->user->id == $profile_id) {
            return $next($request);
        }
        return abort(401);
    }
}

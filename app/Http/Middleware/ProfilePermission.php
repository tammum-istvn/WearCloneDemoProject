<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;

class ProfilePermission
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

        $user = User::findorfail($request->user_id);

        $currentUser = Auth::user()->id;
        // Only the creator could update, delete his content
        if ($user->id == $currentUser) {
            return $next($request);
        }
        return abort(401);
    }
}

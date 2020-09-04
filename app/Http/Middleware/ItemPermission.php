<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Interfaces\IAccountType;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemPermission
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

        $item = Item::findorfail($request->id);
        $profile_id = Auth::user()->id;

        // Only the creator could update, delete his content
        if ($item->user->id == $profile_id) {
            return $next($request);
        }
        return abort(401);
    }
}

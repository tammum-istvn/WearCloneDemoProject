<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function isFavourite(Request $request)
    {
        $favourite = new Follower();
        $favouriteStatus = $favourite->getFavouriteStatus($request->userId, Auth::User()->id);
        return response()->json(array("favouriteStatus" => $favouriteStatus), 200);
    }

    //add or remove favourite
    public function addRemoveFavourite(Request $request)
    {
        $favourite = new Follower();
        if ($request->isInsert == 'true') {
            $favourite->user_id = $request->userId;
            $favourite->follower_id = Auth::User()->id;
            $favourite->save();
            return response()->json(array("msg" => "favourite added!"), 200);
        } else {
            Follower::where('user_id', $request->userId)
                ->where('follower_id', Auth::User()->id)
                ->delete();
            return response()->json(array("msg" => "favourite removed!"), 200);
        }
    }
}

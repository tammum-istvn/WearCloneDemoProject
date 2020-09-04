<?php

namespace App\Http\Controllers;

use App\Models\FavouriteLooks;
use Illuminate\Http\Request;
use App\Models\Look;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LookDetailController extends Controller
{

    public function showLook($id)
    {
        $look = Look::where('is_delete', false)->findorfail($id);
//        $userOfthisLookId = $look->user->id;
        $popular = Look::where('is_delete', false)
        ->where('user_id', $look->user->id)
        ->get()
        ->sortByDesc('FavouriteCount')
        ->except($id)->take(3);
        return view('lookPage.look-page')->with('look', $look)->with('popular', $popular);
    }

    //get likes of looks
    public function addRemoveLike(Request $request)
    {
        $favouriteLooks = new FavouriteLooks();
        if ($request->isInsertLikes == 'true') {
            $favouriteLooks->look_id = $request->lookId;
            $favouriteLooks->user_id = Auth::user()->id;
            $favouriteLooks->save();
            return response()->json(array("msg" => "like inserted!"), 200);
        } else {
            FavouriteLooks::where('user_id', Auth::user()->id)
                ->where('look_id', $request->lookId)
                ->delete();
            return response()->json(array("msg" => "like removed!"), 200);
        }
    }
    //get like status
    public function loadLike(Request $request)
    {
        $favouriteLooks = new FavouriteLooks();
        $likeStatus = $favouriteLooks->isLikeExist($request->lookId);
        $likesCount = $favouriteLooks->getLikesCount($request->lookId);
        return response()->json(array("likeStatus" => $likeStatus, "likesCount" => $likesCount), 200);
    }
}

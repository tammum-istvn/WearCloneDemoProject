<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FavouriteItem extends Model
{
    protected $table = 'favourite_items';

    //function to insert likes
    public function getLikesCount($itemId)
    {
        return DB::table('favourite_items')->where('item_id', $itemId)->count();
    }

    //function for checking like exists or not
    public function isLikeExist($itemId)
    {
        if (Auth::user()) {
            $likeData = DB::table('favourite_items')->where('item_id', $itemId)
                ->where('user_id', Auth::user()->id)->get();
            if (!$likeData->isEmpty()) {
                return true;
            }
        }
        return false;
    }
}

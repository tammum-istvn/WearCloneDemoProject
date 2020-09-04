<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FavouriteLooks extends Model
{
    protected $table = 'favourite_looks';

    //function to insert likes
    public function getLikesCount($lookId)
    {
        return DB::table('favourite_looks')->where('look_id', $lookId)->count();
    }

    //function for checking like exists or not
    public function isLikeExist($lookId)
    {
        if (Auth::user()) {
            $likeData = DB::table('favourite_looks')->where('look_id', $lookId)
                ->where('user_id', Auth::user()->id)->get();
            if (!$likeData->isEmpty()) {
                return true;
            }
        }
        return false;
    }
}

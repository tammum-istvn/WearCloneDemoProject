<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Follower extends Model
{
    public $timestamps = null;

    //function for checking shop is already added to favourite or not
    public function getFavouriteStatus($userId)
    {
        $isFavourite = DB::table('followers')->where('user_id', $userId)
            ->where('follower_id', Auth::User()->id)->get();
        if (!$isFavourite->isEmpty()) {
            return true;
        }
        return false;
    }
}

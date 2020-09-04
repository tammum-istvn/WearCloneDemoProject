<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'id', 'first_name', 'last_name', 'account_type', 'date_of_birth', 'description'
    ];

    // protected $with = ['carts'];
    public function shop()
    {
        return $this->hasOne('App\Models\Shop');
    }

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart')
            ->select(['quantity', 'user_id', 'item_detail_information_id'])
            ->with([
                'itemDetailInformation',
                'itemDetailInformation.itemDetail',
                'itemDetailInformation.itemDetail.item:id,title'
            ]);
    }

    public function look()
    {
        return $this->hasMany('App\Models\Look');
    }

    public function age()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function getNumberOfFollower()
    {
        return Follower::where('user_id', $this->id)->count();
    }
    public function getNumberOfFollowing()
    {
        return Follower::where('follower_id', $this->id)->count();
    }
}

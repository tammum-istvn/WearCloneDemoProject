<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Look extends Model
{
    // protected $fillable = [
    //     // 'id', 'picture','intro','item1', 'item2','item3','item4','item5','user',
    // ];
    protected $guarded = [];


    public function items()
    {
        return $this->hasMany('App\Models\LookItem')
        ->where([
            ['is_delete', false]
            ])
        ;
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function createdAt()
    {
        return Carbon::parse($this->created_at)->format('Y M d');
    }

    public function favourites()
    {
        return $this->hasMany('App\Models\FavouriteLooks');
    }

    public function getFavouriteCountAttribute()
    {
        return FavouriteLooks::where('look_id', $this->id)->count();
    }

    public function hashtags()
    {
        return $this->hasMany('\App\Models\LookHashtag');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

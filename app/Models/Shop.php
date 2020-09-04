<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id','website'
    ];
    // protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item', 'user_id');
    }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id','post_code','province','city','address'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

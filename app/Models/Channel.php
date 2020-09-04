<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //
    protected $fillable = ['sender_id','receiver_id','status'];
    protected $with = ['receiver','sender', 'messages'];

    public function receiver()
    {
//        return $this->belongsTo('App\Models\User','user_id','receiver_id');
        return $this->belongsTo('App\Models\User', 'receiver_id');
    }
    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'sender_id');
    }
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
}

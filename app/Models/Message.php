<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['channel', 'sender', 'message','is_read'];

    public function channel()
    {
        return $this->belongsTo('App\Models\Channel', 'channel_id');
    }
}

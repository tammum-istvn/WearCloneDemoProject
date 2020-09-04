<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LookHashtag extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'look_id', 'hashtag_id',
    ];

    public function look()
    {
        return $this->belongsTo('App\Models\Look');
    }

    public function hashTag()
    {
        return $this->belongsTo('App\Models\Hashtag', 'hashtag_id');
    }
}

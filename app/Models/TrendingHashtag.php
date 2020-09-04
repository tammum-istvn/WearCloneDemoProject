<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrendingHashtag extends Model
{
    protected $fillable = [
        'hashtag_id',
        'total_repeat',
    ];

    public function hashTag()
    {
        return $this->belongsTo('App\Models\Hashtag', 'hashtag_id');
    }
}

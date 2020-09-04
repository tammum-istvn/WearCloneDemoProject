<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = ['name',];

    public function getNumberOfLooks()
    {
        return LookHashtag::where('hashtag_id', $this->id)->count();
    }
}

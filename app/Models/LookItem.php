<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LookItem extends Model
{
    public $timestamps = null;
    protected $fillable = [
        'look_id', 'item_detail_information_id',
    ];

    public function look()
    {
        return $this->belongsTo('App\Models\Look');
    }

    public function itemDetailInformation()
    {
        return $this->belongsTo('App\Models\ItemDetailInformation', 'item_detail_information_id');
    }
}

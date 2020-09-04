<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function items()
    {
        return $this->belongsTo('App\Models\Item', 'id', 'sub_category_id');
    }
}

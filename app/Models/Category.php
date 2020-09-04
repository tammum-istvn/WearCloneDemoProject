<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id','name'];

    // protected $with = ['items'];

    public function subCategories()
    {
        return $this->hasMany('App\Models\SubCategory');
    }
    public function items()
    {
        return $this->belongsTo('App\Models\Item', 'id', 'category_id');
    }
}

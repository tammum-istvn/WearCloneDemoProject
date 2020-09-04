<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'title', 'category_id', 'sub_category_id', 'brand_id', 'user_id', 'description',
    ];

    /**
     * The relationships that should always be loaded [eager load].
     *
     * @var array
     */
    // protected $with = ['details'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'user_id', 'user_id');
    }
    public function shopOtherItems()
    {
        return $this->hasMany('App\Models\Item', 'user_id', 'user_id')
            ->where([
                ['id', '!=', $this->id],
                ['is_delete', false],
            ]);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function subCategory()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function details()
    {
        return $this->hasMany('App\Models\ItemDetail')
            ->where('is_delete', false);
    }

    public function detail()
    {
        return $this->hasMany('App\Models\ItemDetail')
            ->where('is_delete', false)
            ->take(1);
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\ItemReview');
    }

    public function getFavouriteCountAttribute()
    {
        return FavouriteItem::where('item_id', $this->id)->count();
    }
}

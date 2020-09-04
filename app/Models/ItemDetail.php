<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    protected $fillable = ['id', 'color', 'picture', 'item_id', 'isDeleted'];
    protected $guarded = [''];
    public $timestamps = null;

    // cast the picture json to an array
    protected $casts = [
        'picture' => 'array',
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

    public function informations()
    {
        return $this->hasMany('App\Models\ItemDetailInformation')->where('is_delete', false);
    }
}

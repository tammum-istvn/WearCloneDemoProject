<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDetailInformation extends Model
{
    protected $table = 'item_detail_informations';
    protected $guarded = [''];
    public $timestamps = null;

    public function itemDetail()
    {
        return $this->belongsTo('App\Models\ItemDetail');
    }
    public function price()
    {
        $symbol = 'đ';
        $symbol_thousand = '.';
        $decimal_place = 0;
        $price = number_format($this->price, $decimal_place, '', $symbol_thousand);
        return $price.$symbol;
    }
}

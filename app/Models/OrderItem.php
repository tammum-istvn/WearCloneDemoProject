<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    
    public function itemDetailInformation()
    {
        return $this->belongsTo('App\Models\ItemDetailInformation');
    }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
}

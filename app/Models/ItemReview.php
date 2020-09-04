<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ItemReview extends Model
{
    public function orderItem()
    {
        return $this->hasOne('App\Models\OrderItem');
    }
}

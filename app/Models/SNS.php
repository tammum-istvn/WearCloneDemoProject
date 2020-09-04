<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SNS extends Model
{
    protected $guarded = [''];

    public $incrementing = false;
    protected $primaryKey = 'uuid';
    protected $table = 'sns';
}

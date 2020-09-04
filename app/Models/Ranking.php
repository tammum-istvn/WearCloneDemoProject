<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ranking extends Model
{
    protected $fillable = [
        'user_id','point'
    ];
}

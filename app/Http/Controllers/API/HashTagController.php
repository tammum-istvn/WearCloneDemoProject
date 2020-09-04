<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashTagController extends Controller
{
    public function list()
    {
        return Hashtag::get();
    }
}

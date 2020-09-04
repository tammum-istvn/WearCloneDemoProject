<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Height;

class HeightController extends Controller
{
    public function list()
    {
        return Height::get();
    }
}

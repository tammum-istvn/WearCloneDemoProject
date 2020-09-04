<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ItemDetail;
use Illuminate\Http\Request;

class ItemDetailController extends Controller
{
    public function getDetail($id)
    {
        $itemDetail = ItemDetail::with('informations')->find($id);
        return json_encode($itemDetail);
    }
}

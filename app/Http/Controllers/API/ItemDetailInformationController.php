<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ItemDetailInformation;
use Illuminate\Http\Request;

class ItemDetailInformationController extends Controller
{
    public function isAvailable($id)
    {
        return ItemDetailInformation::where([
            ['id', $id],
            ['is_delete', false]
            ])
        ->whereHas('itemDetail', function ($itemDetail) {
            $itemDetail->where('is_delete', false);
            $itemDetail->whereHas('item', function ($item) {
                $item->where('is_delete', false);
            });
        })
        ->first() ? true:false;
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->q;

        $items =  Item::where('is_delete', false)
            ->where('title', 'LIKE', '%' . $query . '%')
            ->select(['items.id', 'user_id', 'brand_id', 'title'])
            ->addSelect(['picture' => function ($query) {
                $query->select('picture')
                    ->from('item_details')
                    ->where('is_delete', false)
                    ->whereColumn('item_id', 'items.id')
                    ->limit(1);
            }])
            ->withCasts(['picture' => 'array'])
            ->with('user:id,first_name', 'brand')
            ->get()
            ->map(function ($item) {
                return $this->format($item);
            });
        return $items;
    }

    public function itemDetail($id)
    {
        $item = Item::where('id', $id)
            ->firstOrFail();

        return [
            'id'            => $item->id,
            'name'          => $item->title,
            'shop'          => $item->user->first_name,
            'category'      => optional($item->category)->name,
            'sub_category'  => optional($item->subCategory)->name,
            'brand'         => optional($item->brand)->name,
            'details'       => $this->formatItemDetails($item->details),
        ];
    }

    public function format($item)
    {
        return [
            'id'            => $item->id,
            'name'          => $item->title,
            'shop'          => $item->user->first_name,
            'brand'         => optional($item->brand)->name,
            'picture'       => optional($item->picture)[0],
        ];
    }

    public function formatItemDetails($details)
    {
        $data = array();
        foreach ($details as $detail) {
            foreach ($detail->informations as $information) {
                array_push($data, [
                    'detail_information_id'     => $information->id,
                    'price'     => $information->price,
                    'size'      => $information->size,
                    'color'     => $detail->color,
                    'picture'   => optional($detail->picture)[0],
                ]);
            }
        }
        return $data;
    }

    public function listByUser($user)
    {
        return Item::where('user', $user)->get();
    }
}

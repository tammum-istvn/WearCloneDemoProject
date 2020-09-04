<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart($user_id)
    {
        // $cart =  Cart::where('user_id', $user_id)
        //     ->select(['quantity', 'user_id', 'item_detail_information_id'])
        //     ->with([
        //         'itemDetailInformation',
        //         'itemDetailInformation.itemDetail',
        //         'itemDetailInformation.itemDetail.item:id,title'
        //     ])
        //     ->get();

        $cart =  Cart::where('carts.user_id', $user_id)
            ->join('item_detail_informations', 'carts.item_detail_information_id', 'item_detail_informations.id')
            ->join('item_details', 'item_detail_informations.item_detail_id', 'item_details.id')
            ->join('items', 'item_details.item_id', 'items.id')
            ->select([
                'carts.item_detail_information_id',
                'item_details.item_id',
                'items.title',
                'carts.quantity',
                'item_details.color',
                'item_details.picture',
                'item_detail_informations.size',
                'item_detail_informations.price',
            ])
            ->get();

        $totalQuantity = 0;
        foreach ($cart as $key => $item) {
            $cart[$key]->picture = $this->pictureDecode($item->picture);
            $totalQuantity += $item->quantity;
        }
        $response['quantity'] = $totalQuantity;
        $response['cart'] = $cart;

        return $response;
    }

    public function save(Request $request)
    {
        $item = Cart::updateOrCreate(
            ['user_id' => $request->user_id, 'item_detail_information_id' => $request->item_detail_information_id],
            ['quantity' => $request->quantity]
        );

        // return $item;
        // return $this->getCartItem($item->user_id, $item->item_detail_information_id);
    }

    public function getCartItem($user_id, $item_detail_information_id)
    {
        $item =  Cart::where([
            ['carts.user_id', $user_id],
            ['carts.item_detail_information_id', $item_detail_information_id]
        ])
            ->join('item_detail_informations', 'carts.item_detail_information_id', 'item_detail_informations.id')
            ->join('item_details', 'item_detail_informations.item_detail_id', 'item_details.id')
            ->join('items', 'item_details.item_id', 'items.id')
            ->select([
                'carts.item_detail_information_id',
                'item_details.item_id',
                'items.title',
                'carts.quantity',
                'item_details.color',
                'item_details.picture',
                'item_detail_informations.size',
                'item_detail_informations.price',
            ])
            ->first();

        $item->picture = $this->pictureDecode($item->picture);

        return $item;
    }

    private function pictureDecode($picture)
    {
        return json_decode($picture)[0];
    }
}

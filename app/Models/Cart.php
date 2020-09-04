<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cart extends Model
{
    protected $guarded = [''];
    public function itemDetailInformation()
    {
        return $this->belongsTo('App\Models\ItemDetailInformation', 'item_detail_information_id');
    }

    public function totalItem($user_id)
    {
        $cart = Cart::where('user_id', $user_id)->get();
        $total = 0;
        foreach ($cart as $item) {
            $total += $cart->quantity;
        }

        return $total;
    }


    public function getCart($user_id)
    {
        $cart =  Cart::where('carts.user_id', $user_id)
            ->join('item_detail_informations', 'carts.item_detail_information_id', 'item_detail_informations.id')
            ->join('item_details', 'item_detail_informations.item_detail_id', 'item_details.id')
            ->join('items', 'item_details.item_id', 'items.id')
            ->select([
                'carts.id',
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

        return  $response;
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
                'carts.id',
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

    // public function save($user_id, $item_detail_information_id, $quantity)
    // {
    //     return $user_id.' '.$item_detail_information_id.' '.$quantity;
    //     $item = Cart::updateOrCreate(
    //         ['user_id' => $user_id, 'item_detail_information_id' => $item_detail_information_id],
    //         ['quantity' => $quantity]
    //     );

    //     return $item;
    // }
}

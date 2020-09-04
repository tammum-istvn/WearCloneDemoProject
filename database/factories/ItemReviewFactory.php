<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ItemDetail;
use App\Models\ItemReview;
use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(ItemReview::class, function (Faker $faker) {
    // $order_Rivew
    // $orders = Order::where('status','delivered')->notWhere()->get()->toArray();
    // dd($orders[0]);
    // $orderItem = Order::find($randomOrder['id'])->orderItems;
    // $itemDetail = ItemDetail::find($orderItem->id);

    return [
        'order_item_id' => '',
        'item_id'       => '',
        'review'        => $faker->realText($faker->numberBetween(10,30)),
        'rating'        => rand(1,5),
    ];
});

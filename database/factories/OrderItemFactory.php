<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ItemDetail;
use App\Models\ItemDetailInformation;
use App\Models\Look;
use App\Models\Order;
use App\Models\OrderItem;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    $order_id = $faker->randomElement(Order::pluck('id')->toArray());
    $item_detail_information_id = $faker->randomElement(ItemDetailInformation::pluck('id')->toArray());
    $look_id = $faker->randomElement(Look::pluck('id')->toArray());

    return [
        'order_id'                      => $order_id,
        'item_detail_information_id'    => $item_detail_information_id,
        'look_id'                       => $look_id,
        'quantity'                      => rand(2,5),
        'shipping_fee'                  => rand(10,40),
    ];
});

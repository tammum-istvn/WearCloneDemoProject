<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ItemDetailInformation;
use App\Models\ItemDetail;
use Faker\Generator as Faker;

$factory->define(ItemDetailInformation::class, function (Faker $faker) {

    $item_detail_id = $faker->randomElement(ItemDetail::pluck('id')->toArray());

    return [
        'item_detail_id'    => $item_detail_id,
        'size'              => $faker->randomElement(['s', 'm', 'l', 'xl']), 
        'price'             => rand(100000, 1000000),
    ];
});

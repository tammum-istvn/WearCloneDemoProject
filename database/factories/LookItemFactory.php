<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LookItem;
use App\Models\ItemDetailInformation;
use App\Models\Look;
use Faker\Generator as Faker;

$factory->define(LookItem::class, function (Faker $faker) {

    $look_id = $faker->randomElement(Look::pluck('id')->toArray());
    $item_detail_information_id = $faker->randomElement(ItemDetailInformation::pluck('id')->toArray());

    return [
        'look_id'                       => $look_id,
        'item_detail_information_id'    => $item_detail_information_id,
    ];
});

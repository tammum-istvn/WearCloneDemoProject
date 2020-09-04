<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use App\Models\ItemDetail;
use Faker\Generator as Faker;

$factory->define(ItemDetail::class, function (Faker $faker) {

    $item_id = $faker->randomElement(Item::pluck('id')->toArray());
    $colors = array('white','black', 'gray', 'brown', 'beige', 'green', 'blue', 'purple', 'yellow', 'pink', 'red', 'orange', 'silver', 'gold', '');
    $picture = array('img/item/item-pic'.rand(1,5).'.jpg', 'img/item/item-pic'.rand(6,10).'.jpg');
    return [
        'item_id'       => $item_id,
        'color'         => $faker->randomElement($colors),
        'picture'       => $picture,
    ];
});

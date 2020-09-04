<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use App\Models\Look;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Look::class, function (Faker $faker) {
    $user_id = $faker->randomElement(User::where('account_type', 'individual')->pluck('id')->toArray());
    $gender = $faker->randomElement(['men', 'women', 'kids']);

    if ($gender == 'kids') {
        $age = $faker->numberBetween(1,17);
        $height = $faker->numberBetween(40,140);
    } else{
        $age = $faker->numberBetween(18,110);
        $height = $faker->numberBetween(130,190);
    }

    return [
        'user_id'       => $user_id,
        'title'         => 'look '. rand(1,100),
        'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'picture'       => 'images/product/product'.rand(1,10).'.jpg',
        'picture'       => 'images/product/product'.rand(1,10).'.jpg',
        'gender'        => $gender,
        'height'        => $height,
        'age'           => $age,
    ];
});

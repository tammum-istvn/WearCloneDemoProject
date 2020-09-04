<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    $user_id = $faker->randomElement(User::pluck('id')->toArray());
    return [
        'user_id' => $user_id,
        'post_code' => $faker->postcode,
        'province' => $faker->state,
        'city'  => $faker->city,
        'address'   => $faker->address,
    ];
});

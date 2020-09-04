<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $address_id = $faker->randomElement(Address::pluck('id')->toArray());
    $address = Address::find($address_id);

    return [
        'user_id'       => $address->user_id,
        'address_id'    => $address_id,
        'status'        => $faker->randomElement(['processing', 'shipping', 'delivered', 'canceled']),
    ];
});

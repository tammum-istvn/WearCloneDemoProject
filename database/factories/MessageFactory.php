<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Channel;
use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    $channels       = Channel::get();
    $randomChannel  = $faker->randomElement($channels);

    return [
        'channel_id'    => $randomChannel->id,
        'sender_id'     => $faker->randomElement([$randomChannel->sender_id, $randomChannel->receiver_id]),
        'message'       => $faker->realText($faker->numberBetween(10,50)),
        'is_read'       => $faker->randomElement([1, 0]),
    ];
});

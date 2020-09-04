<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Channel;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Channel::class, function (Faker $faker) {
    
    $users = User::pluck('id')->toArray();
    $sender_id = $faker->randomElement($users);
    $receiver_id = $faker->randomElement($users);

    if (sizeof($users) > 1) {
        while ($sender_id == $receiver_id) {
            $receiver_id = $faker->randomElement($users); 
        }
    }

    return [
        'sender_id' => $sender_id,
        'receiver_id' => $receiver_id,
        'status' => $faker->randomElement(['open', 'closed']),
    ];
});

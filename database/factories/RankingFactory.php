<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Ranking;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Ranking::class, function (Faker $faker) {

    $ranking_users = Ranking::pluck('user_id');
    $users = User::pluck('id');
    $users = $users->diff($ranking_users);

    return [
        'user_id'   => $faker->randomElement($users),
        'point'     => $faker->numberBetween(100,500),
    ];
});

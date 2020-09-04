<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Login;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Login::class, function (Faker $faker) {
    $user_id = $faker->randomElement(User::pluck('id')->toArray());
    return [
        'user_id'           => $user_id,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
});

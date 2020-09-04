<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['men', 'women', 'kids']);

    if ($gender == 'kids') {
        $height = $faker->numberBetween(40,140);
    } else{
        $height = $faker->numberBetween(130,190);
    }

    return [
        'first_name'    => $faker->name(),
        'last_name'     => $faker->lastName,
        'account_type'  => $faker->randomElement(['individual', 'shop']),
        'picture'       => 'img/look'.rand(1,4).'.jpg',
        'introduction'  => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'gender'        => $gender,
        'height'        => $height,
    ];
});


<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Shop;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Shop::class, function (Faker $faker) {
    $user_id = DB::select("select id from users where account_type = 'shop' and (select count(*) from shops where shops.user_id = users.id) < 1 limit 1");
    return [
        'user_id'   => $user_id[0]->id,
        'website'   => $faker->domainName,
    ];
});

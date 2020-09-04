<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;

use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    
    $user = $faker->randomElement(User::where('account_type', 'shop')->pluck('id')->toArray());
    $category = $faker->randomElement(Category::pluck('id')->toArray());
    $subCategory = $faker->randomElement(SubCategory::find($category)->pluck('id')->toArray());
    $brand = $faker->randomElement(Brand::pluck('id')->toArray());

    return [
        'user_id'           => $user,
        'category_id'       => $category,
        'sub_category_id'   => $subCategory,
        'brand_id'          => $brand,
        'title'             => 'Item ' . rand(1, 100),
        'description'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    ];
});

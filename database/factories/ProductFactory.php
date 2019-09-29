<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => str_random(10),
        'price' => $faker->randomFloat(2, 1, 1000),
        'quantity' => $faker->numberBetween(1, 999),
        'description' => $faker->sentences(15, true),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'user_id' => function () {
            $users = App\User::all()->random(1);

            foreach ($users as $user) {
                return $user->id;
            }
        },
        'category_id' => function () {
            $categories = App\Category::all()->random(1);

            foreach ($categories as $category) {
                return $category->id;
            }
        },
        'brand_id' => function () {
            $brands = App\Brand::all()->random(1);

            foreach ($brands as $brand) {
                return $brand->id;
            }
        },
        'file' => function () {

        },
    ];
});

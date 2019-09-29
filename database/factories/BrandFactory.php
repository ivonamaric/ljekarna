<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});

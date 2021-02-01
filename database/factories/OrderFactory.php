<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'business_id' => rand( 1, 50),
         'user_id'=> $faker->dateTimeThisYear('+1 month'),
        'order_date' => rand(1,4),
        'address' => $faker->address,
        'latitude' => rand(1,4),
        'longitude' => rand(1,4),
        'description' => $faker->text(2000),
        'status' => rand(1,4),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Advertiser;
use Faker\Generator as Faker;

$factory->define(Advertiser::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,

    ];
});

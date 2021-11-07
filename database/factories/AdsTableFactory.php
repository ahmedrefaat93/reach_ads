<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ad;
use Faker\Generator as Faker;

$factory->define(Ad::class, function (Faker $faker) {
    return [
        //
        'type'=>$faker->randomElement(['free','paid']),
        'title'=> $faker->word(2),
        'description'=>$faker->sentence(50),
        'category_id'=>\App\Models\Category::all()->random()->id,
        'advertiser_id'=>\App\Models\Advertiser::all()->random()->id,
        'start_date'=>$faker->dateTimeBetween('+1 days', '+5 days')
    ];
});

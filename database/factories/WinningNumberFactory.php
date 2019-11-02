<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modules\WinningNumber\WinningNumber;

use Faker\Generator as Faker;

$factory->define(WinningNumber::class, function (Faker $faker) {
    return [
        //
        'number' => $faker->unique()->randomNumber(4, true)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\AobpCalculation;
use Faker\Generator as Faker;

$factory->define(AobpCalculation::class, function (Faker $faker) {

    return [
        'sys' => $faker->word,
        'dia' => $faker->word,
        'hr' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'patient_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

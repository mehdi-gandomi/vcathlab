<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\ImtCalculation;
use Faker\Generator as Faker;

$factory->define(ImtCalculation::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'patient_id' => $faker->randomDigitNotNull,
        'LCIMT' => $faker->word,
        'RCIMT' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

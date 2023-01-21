<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\ComputationCenter;
use Faker\Generator as Faker;

$factory->define(ComputationCenter::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'patient_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'physician' => $faker->word,
        'hospital' => $faker->word,
        'age' => $faker->randomDigitNotNull,
        'sex' => $faker->word,
        'mobile' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

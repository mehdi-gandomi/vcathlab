<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\BodyComposition;
use Faker\Generator as Faker;

$factory->define(BodyComposition::class, function (Faker $faker) {

    return [
        'patient_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'Age' => $faker->word,
        'Sex' => $faker->word,
        'Waist' => $faker->word,
        'SMM' => $faker->word,
        'VFP' => $faker->word,
        'Height' => $faker->word,
        'Weight' => $faker->word,
        'Hip' => $faker->word,
        'BFMP' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

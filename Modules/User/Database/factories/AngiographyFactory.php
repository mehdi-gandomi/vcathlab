<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\Angiography;
use Faker\Generator as Faker;

$factory->define(Angiography::class, function (Faker $faker) {

    return [
        'Cr' => $faker->word,
        'Ht' => $faker->word,
        'LVEF' => $faker->word,
        'HR' => $faker->word,
        'Contrast' => $faker->word,
        'Hb' => $faker->word,
        'PTP' => $faker->word,
        'CAVI' => $faker->word,
        'WBC' => $faker->word,
        'PriorCABG' => $faker->word,
        'PriorPCI' => $faker->word,
        'HbA1C' => $faker->word,
        'patient_id' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'Age' => $faker->word,
        'SBP' => $faker->word,
        'DBP' => $faker->word,
        'Heigth' => $faker->word,
        'Weigth' => $faker->word,
        'Sex' => $faker->word,
        'pribleed' => $faker->word,
        'Hypotension' => $faker->word,
        'heart_failure' => $faker->word,
        'Diabet' => $faker->word,
        'Acute_MI' => $faker->word,
        'IABP' => $faker->word,
        'Smoker' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\MaceAssesment;
use Faker\Generator as Faker;

$factory->define(MaceAssesment::class, function (Faker $faker) {

    return [
        'patient_id' => $faker->word,
        'user_id' => $faker->word,
        'HbA1C' => $faker->word,
        'LDL_cholesterol' => $faker->word,
        'HDL_cholesterol' => $faker->word,
        'Age' => $faker->word,
        'SBP' => $faker->word,
        'Triglycerides' => $faker->word,
        'DBP' => $faker->word,
        'LeftAnklebrachialIndex' => $faker->word,
        'RightAnklebrachialIndex' => $faker->word,
        'Heigth' => $faker->word,
        'Weigth' => $faker->word,
        'Sex' => $faker->word,
        'Smoker' => $faker->word,
        'TBP' => $faker->word,
        'MI' => $faker->word,
        'Diabetes' => $faker->word,
        'FH' => $faker->word,
        'THL' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

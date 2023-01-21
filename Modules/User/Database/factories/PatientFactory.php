<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'age' => $faker->randomDigitNotNull,
        'sex' => $faker->word,
        'hospital' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

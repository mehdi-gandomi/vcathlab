<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\NIFFRCase;
use Faker\Generator as Faker;

$factory->define(NIFFRCase::class, function (Faker $faker) {

    return [
        'patient_id' => $faker->word,
        'file' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word,
        'patient.name' => $faker->text,
        'patient.age' => $faker->text,
        'patient.hospital' => $faker->text
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Admin\Models\CtCase;
use Faker\Generator as Faker;

$factory->define(CtCase::class, function (Faker $faker) {

    return [
        'patient_id' => $faker->word,
        'ct_file' => $faker->word,
        'result_file' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word,
        'patient.name' => $faker->text,
        'patient.age' => $faker->text,
        'patient.hospital' => $faker->text
    ];
});

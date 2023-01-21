<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\EchoCalculation;
use Faker\Generator as Faker;

$factory->define(EchoCalculation::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'LVEDD' => $faker->word,
        'LVESD' => $faker->word,
        'IVSD' => $faker->word,
        'DBP' => $faker->word,
        'PWTD' => $faker->word,
        'TAPSE' => $faker->word,
        'PAP' => $faker->word,
        'SBP' => $faker->word,
        'LVEF' => $faker->word,
        'Weight' => $faker->word,
        'Height' => $faker->word,
        'HR' => $faker->word,
        'conditions' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

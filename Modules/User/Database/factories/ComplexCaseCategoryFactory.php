<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\ComplexCaseCategory;
use Faker\Generator as Faker;

$factory->define(ComplexCaseCategory::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

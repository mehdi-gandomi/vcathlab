<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Admin\Models\ComplexCase;
use Faker\Generator as Faker;

$factory->define(ComplexCase::class, function (Faker $faker) {

    return [
        'complex_case_category_id' => $faker->word,
        'title' => $faker->word,
        'slug' => $faker->word,
        'user_id' => $faker->word,
        'summary' => $faker->text,
        'short_summary' => $faker->text,
        'file' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\AccessLevel\Models\UserActivity;
use Faker\Generator as Faker;

$factory->define(UserActivity::class, function (Faker $faker) {

    return [
        'log_name' => $faker->word,
        'description' => $faker->text,
        'subject_id' => $faker->word,
        'subject_type' => $faker->word,
        'causer_id' => $faker->word,
        'causer_type' => $faker->word,
        'system_ip' => $faker->word,
        'properties' => $faker->text,
        'created_at' => $faker->word
    ];
});

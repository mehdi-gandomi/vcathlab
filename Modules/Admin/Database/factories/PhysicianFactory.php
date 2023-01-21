<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Admin\Models\Physician;
use Faker\Generator as Faker;

$factory->define(Physician::class, function (Faker $faker) {

    return [
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'profession' => $faker->word,
        'specialty' => $faker->word,
        'hostpital' => $faker->word,
        'user_id' => $faker->word,
        'cover' => $faker->word,
        'avatar' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

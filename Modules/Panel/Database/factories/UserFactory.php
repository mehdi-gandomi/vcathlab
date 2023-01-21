<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Panel\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'email' => $faker->word,
        'personnel_id' => $faker->randomDigitNotNull,
        'username' => $faker->word,
        'registrator_id' => $faker->randomDigitNotNull,
        'accounttype_id' => $faker->word,
        'state' => $faker->word,
        'master' => $faker->word,
        'last_active' => $faker->word,
        'email_verified_at' => $faker->word,
        'password' => $faker->word,
        'remember_token' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

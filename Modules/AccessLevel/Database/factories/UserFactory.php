<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\AccessLevel\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'email' => $faker->word,
        'master' => $faker->word,
        'email_verified_at' => $faker->word,
        'username' => $faker->word,
        'mobile' => $faker->word,
        'avatar_url' => $faker->word,
        'created_at' => $faker->word,
        'state' => $faker->word
    ];
});

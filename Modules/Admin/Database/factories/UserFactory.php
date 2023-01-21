<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Admin\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    return [
        'username' => $faker->word,
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'state' => $faker->word,
        'province_id' => $faker->word,
        'city_id' => $faker->word,
        'country' => $faker->word,
        'profession' => $faker->word,
        'specialty' => $faker->word,
        'mobile' => $faker->word,
        'email' => $faker->word,
        'email_verified_at' => $faker->word,
        'password' => $faker->word,
        'two_factor_secret' => $faker->text,
        'two_factor_recovery_codes' => $faker->text,
        'remember_token' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word,
        'ticketit_admin' => $faker->word,
        'ticketit_agent' => $faker->word
    ];
});

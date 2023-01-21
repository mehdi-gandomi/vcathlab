<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\User\Models\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {

    return [
        'slug' => $faker->word,
        'name' => $faker->word,
        'description' => $faker->word,
        'is_active' => $faker->word,
        'price' => $faker->word,
        'signup_fee' => $faker->word,
        'currency' => $faker->word,
        'trial_period' => $faker->word,
        'trial_interval' => $faker->word,
        'invoice_period' => $faker->word,
        'invoice_interval' => $faker->word,
        'grace_period' => $faker->word,
        'grace_interval' => $faker->word,
        'prorate_extend_due' => $faker->word,
        'active_subscribers_limit' => $faker->word,
        'sort_order' => $faker->randomDigitNotNull,
        'created_at' => $faker->word,
        'updated_at' => $faker->word,
        'deleted_at' => $faker->word
    ];
});

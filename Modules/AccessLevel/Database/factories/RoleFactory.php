<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\AccessLevel\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'title' => $faker->word
    ];
});

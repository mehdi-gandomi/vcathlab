<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\AccessLevel\Models\SubSystem;
use Faker\Generator as Faker;

$factory->define(SubSystem::class, function (Faker $faker) {

    return [
        'title' => $faker->text,
        'route' => $faker->word,
        'icon_class' => $faker->word,
        'header_title' => $faker->text,
        'ordering' => $faker->randomDigitNotNull,
        'state' => $faker->word
    ];
});

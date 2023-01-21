<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\AccessLevel\Models\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {

    return [
        'subsystem_id' => $faker->randomDigitNotNull,
        'menu_id' => $faker->randomDigitNotNull,
        'title' => $faker->text,
        'icon_class' => $faker->word,
        'route' => $faker->word,
        'ordering' => $faker->randomDigitNotNull,
        'open_in_blank' => $faker->word,
        'open_in_iframe' => $faker->word,
        'description' => $faker->word,
        'state' => $faker->word
    ];
});

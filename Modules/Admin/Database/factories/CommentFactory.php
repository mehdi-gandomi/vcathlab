<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Admin\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

    return [
        'commentable_type' => $faker->word,
        'commentable_id' => $faker->word,
        'name' => $faker->word,
        'email' => $faker->word,
        'comment' => $faker->text,
        'is_approved' => $faker->word,
        'user_id' => $faker->word,
        'created_at' => $faker->word,
        'updated_at' => $faker->word
    ];
});

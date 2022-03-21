<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [

        'user_id'=> $faker->numberBetween(1, 30),
        // 'user_id'=> 1,
        'content' => $faker->text,
        // 'type'=>'news'
    ];
});

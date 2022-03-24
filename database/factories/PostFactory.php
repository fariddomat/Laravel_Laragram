<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [

        'user_id' => $faker->numberBetween(1, 30),
        // 'user_id'=> 1,
        'content' => $faker->text,
    ];
});

$factory->state(Post::class, 'news', function (\Faker\Generator $faker) {
    return [
        'type' => 'news'
    ];
});
$factory->state(Post::class, 'project', function (\Faker\Generator $faker) {
    return [
        'type' => 'project'
    ];
});

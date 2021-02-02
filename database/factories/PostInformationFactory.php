<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostInformation;
use App\Post;//per la secondary key
/* use Illuminate\Support\Str;//per l'helper slug */
use Faker\Generator as Faker;

$factory->define(App\PostInformation::class, function (Faker $faker) {

    $postId = App\Post::pluck('id')->toArray();
    /* $slugPostId = Str::of($postId)->slug('-'); */
    return [
        'post_id' => $faker->randomElement($postId),
        'description' => $faker->paragraph($nbSentences = random_int(1,5), $variableNbSentences = true),
        'slug' => '',
    ];
});

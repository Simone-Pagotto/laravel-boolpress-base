<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $fakeSentence = rtrim($faker->sentence($nbWords = random_int(1,5), $variableNbWords = true),".");
    return [
        'title' => $fakeSentence,
        'slug' => str_replace(' ','-',$fakeSentence),
    ];
});

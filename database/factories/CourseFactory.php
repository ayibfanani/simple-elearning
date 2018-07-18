<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->sentence,
        'subtitle' => $faker->sentence,
        'content' => $faker->paragraph,
        'thumb' => $faker->imageUrl,
        'attachments' => '',
    ];
});

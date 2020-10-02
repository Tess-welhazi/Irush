<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
  // $videoIds = Video::all()->pluck('id')->toArray(); will need later for many to many
    return [
      'name' => $faker->realText($maxNbChars = 20, $indexSize = 2),
      'price' => $faker->numberBetween(5,5000),
      'imageFile' => $faker->imageUrl($width = 640, $height = 480),
      'videoFile' => $faker->fileExtension('mp4') . '.mp4',
      'user_id' => $faker->numberBetween(1,7),
      'license' => $faker->randomElement(['CC BY-ND', 'CC BY', 'CC BY-NC', 'CC BY-NC-SA']),
      'description'=> $faker->realText($maxNbChars = 50, $indexSize = 2),
    ];
});

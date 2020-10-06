<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
  // $videoIds = Video::all()->pluck('id')->toArray(); will need later for many to many
    return [
      'name' => $faker->bs,
      'price' => $faker->numberBetween(5,300),
      'imageFile' => $faker->randomElement(['/video-factory/animals.jpg','/video-factory/food.jpeg','/video-factory/nature.jpg','/video-factory/people.jpg','/video-factory/urban.jpg',]),
      'videoFile' => '1601904883.mp4',
      'user_id' => $faker->numberBetween(1,7),
      'license' => $faker->randomElement(['CC BY-ND', 'CC BY', 'CC BY-NC', 'CC BY-NC-SA']),
      'description'=> $faker->realText($maxNbChars = 50, $indexSize = 2),
    ];
});

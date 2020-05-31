<?php

use Illuminate\Database\Seeder;
use App\Video;
use App\Category;

class CategoryVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $videos = Video::all();
      $categories = Category::all();

      $videos->each(function (App\Video $v) use ($categories)
      {
        $v->categories()->attach(
          $categories->random(rand(1,5))->pluck('id')->toArray()
        );
      });
    }
}

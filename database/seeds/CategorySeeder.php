<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = Carbon::now()->toDateTimeString();
      $category = [
        [
           'name'=>'food', 'slug'=>'food',
        ],
        [
           'name'=>'animals', 'slug'=>'animals',
        ],
        [
          'name'=>'people', 'slug'=>'people',
        ],
        [
          'name'=>'urban', 'slug'=>'urban',
        ],
        [
          'name'=>'nature', 'slug'=>'nature',
        ]

      ];

      foreach ($category as $key => $value) {
          Category::create($value);
        }
    }
}

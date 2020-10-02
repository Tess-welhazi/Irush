<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 'slug'=>'nature',
     *   'slug'=>'urban',
     *
     *
     * @return void
     */
    public function run()
    {
      $now = Carbon::now()->toDateTimeString();
      $category = [
        [
           'name'=>'food', 
        ],
        [
           'name'=>'animals',
        ],
        [
          'name'=>'people',
        ],
        [
          'name'=>'urban',
        ],
        [
          'name'=>'nature',
        ]

      ];

      foreach ($category as $key => $value) {
          Category::create($value);
        }
    }
}

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
      $category = [
        [
           'name'=>'food',
        ],
        [
           'name'=>'animals',
        ],
        [
          'name'=>'people'
        ],
        [
          'name'=>'urban'
        ],
        [
          'name'=>'nature'
        ]

      ];

      foreach ($category as $key => $value) {
          Category::create($value);
        }
    }
}

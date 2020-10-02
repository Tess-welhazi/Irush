<?php

use Illuminate\Database\Seeder;
use App\Video;
use App\Category;


class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video = [
          [
            'name' => 'NiER Automata trailer',
            'price' => '60',
            'videoFile' => 'NieR_trailer.mp4',
            'imageFile' => 'nier.png',
            'user_id' => '1',
            'license' => 'CC BY',
            'description'=>'Watch the NieR: Automata “Glory to Mankind 119450310” trailer to find out more about androids 2B, 9S and A2 and their battle to reclaim the machine-driven dystopia overrun by powerful machines.',

          ],
          [
            'name' => 'Boat dog',
            'price' => '33',
            'videoFile' => '1597842010.mp4',
            'imageFile' => 'boat_dog.png',
            'user_id' => '1',
            'license' => 'CC BY-NC',
            'description'=>'a dog on a boat',

          ],
          [
            'name' => 'Hamster flashback',
            'price' => '15',
            'videoFile' => 'Hamster.mp4',
            'imageFile' => 'Hamster.png',
            'user_id' => '1',
            'license' => 'CC BY-NC',
            'description'=>'dont think..just feel',

          ],
        ];

        foreach ($video as $key => $value) {
            Video::create($value);
          };


        $videos= factory(App\Video::class, 1)->create();
        $categories = Category::all();

        // $categories = Category::all()->pluck('id')->toArray();
        // $random = $categories->random(1);
        // $videos->each(function (App\Video $v) use ($categories) {
        // $v->categories()->attach($random);
        //   });
// from stack overflow

    // $recipes = factory(App\Recipe::class, 30)->create();
    // $ingredients = factory(App\Ingredient::class, 20)->create();
    // $recipes->each(function (App\Recipe $r) use ($ingredients) {
    //     $r->ingredients()->attach(
    //         $ingredients->random(rand(5, 10))->pluck('id')->toArray(),
    //         ['grams' => 5]
    //     );
    // });

    $videos->each(function (App\Video $v) use ($categories)
    {
      $v->categories()->attach(
        $categories->random(rand(1,3))->pluck('id')->toArray()
      );
    });



    }
}

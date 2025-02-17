<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 5)->create();
      $user = [
        [
           'name'=>'Admin',
           'email'=>'admin@email.com',
            'is_admin'=>'1',
           'password'=> bcrypt('123456'),
        ],
        [
           'name'=>'User',
           'email'=>'user@email.com',
            'is_admin'=>'0',
           'password'=> bcrypt('123456'),
        ],
      ];

      foreach ($user as $key => $value) {
          User::create($value);
        }
    }


}

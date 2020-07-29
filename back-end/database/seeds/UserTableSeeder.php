<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory (App\User::class, 12)->create()->each(function ($user) {
          $comments = factory(App\Comment::class, 2)->make();
          $republic = factory(App\Republic::class)->make();
          //relacao 1-n
          $user->comments()->saveMany($comments);
          //relacao 1-1
          $user->republic()->save($republic);
        });
    }
}

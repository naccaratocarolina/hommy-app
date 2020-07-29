<?php

use Illuminate\Database\Seeder;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory (App\Republic::class, 12)->create()->each(function ($republic) {
          $comments = factory(App\Comment::class, 2)->make();
          $user = factory(App\User::class)->make();
          //relacao 1-n
          $republic->comments()->saveMany($comments);
          //relacao 1-1
          $republic->tenant()->save($user);
          //relacao n-n
          $user->favorites()->attach($republic);
        });
    }
}

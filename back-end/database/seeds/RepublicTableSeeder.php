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
          /*
           * Relationship One to One
           * User rents Republic
           */
          $republic->tenant()->save($user);

          /*
           * Relationship One to Many
           * Republic owns Comment
           */
          $republic->comments()->saveMany($comments);

          /*
           * Relationship One to Many
           * User announces Republic
           */
           $user = App\User::find($republic->user_id);

          /*
           * Relationship Many to Many
           * User favorites Republic
           */
          $user->favorites()->attach($republic);
        });
    }
}

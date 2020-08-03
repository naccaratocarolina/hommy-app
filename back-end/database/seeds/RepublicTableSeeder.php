
<?php

use App\Republic;
use App\Comment;
use App\User;
use Illuminate\Database\Seeder;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      factory(Republic::class, 12)->create()->each(function ($republic) {
        $comments = factory(Comment::class, 2)->make();
        $user = factory(User::class)->make();

        //User rents Republic 1:1
        $republic->tenant()->save($user);

        //Republic owns Comment 1:n
        $republic->comments()->saveMany($comments);

        //User announces Republic 1:n
         $user = User::find($republic->user_id);

         //User post Comment 1:n
         $user->comments()->saveMany($comments);

        //User favorites Republic n:n
        $user->favorites()->attach($republic);
      });
    }
}

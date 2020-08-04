<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\CommentRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\User;
use App\Republic;
use App\Comment;

class UserController extends Controller {
  public function construct() {
    $this->middleware('delete');
  }
  /*
   * Relationship One to One
   * User rents Republic
   * User can rent only 1 Republic
   */
   public function rent($user_id, $republic_id) {
     $user = User::findOrFail($user_id);
     $user->rent($republic_id);
     return response()->json([$user, 'Republica alugada!']);
   }

   public function removeRent($user_id, $republic_id) {
     $user = User::findOrFail($user_id);
     $user->removeRent($republic_id);
     return response()->json([$user, 'Aluguel cancelado!']);
   }

   /*
    * Relationship One to Many
    * User announces Republic
    * User can announce n Republics
    */
    public function announce($user_id, $republic_id) {
      $republic = Republic::findOrFail($republic_id);
      $republic->announce($user_id);
      return response()->json([$republic, 'Republica anunciada!']);
    }

    public function removeAnnounce($user_id, $republic_id) {
      $republic = Republic::findOrFail($republic_id);
      $republic->removeAnnounce($user_id);
      return response()->json([$republic, 'Aluguel cancelado!']);
    }

    public function listRepublics($id) {
      $user = User::findOrFail($id);
      return response()->json($user->republics);
    }

    /*
     * Relationship Many to Many
     * User favorites Republic
     * User can favorite n Republics
     */
     public function favorite($user_id, $republic_id) {
       $user = User::findOrFail($user_id);
       $republic = Republic::findOrFail($republic_id);
       $user->favorites()->attach($republic_id);
       return response()->json([$republic, 'Republica favoridada!']);
     }

     public function removeFavorite($user_id, $republic_id) {
       $user = User::findOrFail($user_id);
       $republic = Republic::findOrFail($republic_id);
       $user->favorites()->detach($republic_id);
       return response()->json([$republic, 'Republica desfavoridada!']);
     }

     public function listFavorites($id) { //ta dando erro
       $user = User::findOrFail($id);
       return response()->json($user->favorites);
     }

    /*
     * Relationship One to Many
     * User post Comment
     * User can post n Comments
     */
     public function post(CommentRequest $request, $user_id) { //ta dando erro
       $user = User::findOrFail($user_id);
       $comment = new Comment;
       $comment->createComment($request);
       $user->post($comment);
       return response()->json($comment);
     }

     /*
      * Basic CRUD for User
      * create, find, list, update, delete
      */

     //creates a new user
     public function createUser(UserRequest $request) {
       $user = new User;
       $user->createUser($request);
       return response()->json([$user, 'User criado com sucesso!']);
     }

     //find an especific user by id
     public function findUser(Request $request, $id){
       $user = User::findOrFail($id);
       return response()->json($user);
     }

     //list all users
     public function listUser(Request $request){
       $user = User::all();

       return response()->json([$user]);
     }

     //update an existing user
     public function updateUser(Request $request, $id) {
       $user = User::find($id);
       $user->updateUser($request);
       return response()->json([$user, 'User atualizado com sucesso!']);
     }

     //deletes an existing user
     public function deleteUser(Request $request, $id){
       User::destroy($id);

       return response()->json(['User deletado com sucesso!']);
     }
}

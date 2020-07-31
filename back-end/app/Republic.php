<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\RepublicRequest;

use App\Users;
use App\Comments;

class Republic extends Model {
    /*
     * Relationship One to One
     * User rents Republic
     * Republic can be rented by only 1 user
     */
     public function tenant() {
         return $this->hasOne('App\User');
     }

    /*
     * Relationship One to Many
     * User announces Republic
     * A Republic can only be announced by 1 user
     */
     public function user() {
       return $this->belongsTo('App\User');
     }

     public function announce($user_id) {
       $user = User::findOrFail($user_id);
       $this->user_id = $user_id;
       $this->save();
     }

     public function removeAnnounce($user_id) {
         $user = Republic::findOrFail($user_id);
         $this->user_id = NULL;
         $this->save();
     }

     /*
      * Relationship Many to Many
      * User favorites Republic
      * A Republic can be favorited by n Users
      */
     public function userFavorites() {
        return $this->belongsToMany('App\User');
      }

      /*
       * Relationship One to Many
       * Republic owns Comment
       * Republic can own n Comments
       */
       public function comments() {
           return $this->hasMany('App\Comment');
       }

      /*
       * Basic CRUD for User
       * create, update
       */
     public function createRepublic(RepublicRequest $request) {
          $republic = new Republic;

          $this->title = $request->title;
          $this->address = $request->address;
          $this->image = $request->image;
          $this->category = $request->category;
          $this->rental_per_month = $request->rental_per_month;
          $this->footage = $request->footage;
          $this->number_bath = $request->number_bath;
          $this->number_bed = $request->number_bed;
          $this->parking = $request->parking;
          $this->animals = $request->animals;
          $this->description = $request->description;

          $this->save();
     }

     public function updateRepublic(Request $request) {
          if($request->title){
           $this->title = $request->title;
          }
         if($request->address){
          $this->address = $request->address;
         }
         if($request->image){
           $this->image = $request->image;
         }
         if($request->category){
           $this->category = $request->category;
         }
         if($request->rental_per_month){
           $this->rental_per_month = $request->rental_per_month;
         }
         if($request->footage){
           $this->footage = $request->footage;
         }
         if($request->number_bath){
           $this->number_bath = $request->number_bath;
         }
         if($request->number_bed){
           $this->number_bed = $request->number_bed;
         }
         if($request->parking){
           $this->parking = $request->parking;
         }
         if($request->animals){
           $this->animals = $request->animals;
         }
         if($request->description){
           $this->description = $request->description;
         }
         $this->save();
     }
}

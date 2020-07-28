<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\RepublicRequest;

use App\Users;
use App\Comments;

class Republic extends Model {
  //Relationships
  public function user() {
      return $this->belongsTo('App\User');
  }

  public function comments() {
      return $this->hasMany('App\Comment');
  }

  public function republic(){
    return $this->belongsTo('App\Republic');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function userFavorites(){
    return $this->belongsToMany('App\User');
  }

  //Methods
  public function createRepublic(RepublicRequest $request) {
    //creating a Republic object called republic
    $republic = new Republic;

    //attributes
    $this->title = $request->title;
    $this->street = $request->street;
    $this->number = $request->number;
    $this->neighborhood = $request->neighborhood;
    $this->city = $request->city;
    $this->imagem_1 = $request->imagem_1;
    $this->imagem_2 = $request->imagem_2;
    $this->imagem_3 = $request->imagem_3;
    $this->category = $request->category;
    $this->rental_per_month = $request->rental_per_month;
    $this->footage = $request->footage;
    $this->number_bath = $request->number_bath;
    $this->number_bed = $request->number_bed;
    $this->parking = $request->parking;
    $this->animals = $request->animals;
    $this->description = $request->description;

    //saving
    $this->save();
  }

  public function updateRepublic(RepublicRequest $request, $id) {
    if($request->title){
      $this->title = $request->title;
    }
    if($request->street){
      $this->street = $request->street;
    }
    if($request->number){
      $this->number = $request->number;
    }
    if($request->neighborhood){
      $this->neighborhood = $request->neighborhood;
    }
    if($request->city){
      $this->city = $request->city;
    }
    if($request->imagem_1){
      $this->imagem_1 = $request->imagem_1;
    }
    if($request->imagem_2){
      $this->imagem_2 = $request->imagem_2;
    }
    if($request->imagem_3){
      $this->imagem_3 = $request->imagem_3;
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

  public function announce($user_id) {
    $user = User::findOrFail($user_id);
    $this->user_id = $user_id;
    $this->save();
  }

}

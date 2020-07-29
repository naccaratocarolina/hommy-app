<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\CommentRequest;

use App\Comment;
use App\Republic;

class User extends Authenticatable {
    use Notifiable;

    /*
     * Relationship One to One
     * User rents Republic
     * User can rent only 1 Republic
     */
     public function republic() {
       return $this->belongsTo('App\Republic');
     }

    public function rent($republic_id) {
        $republic = Republic::findOrFail($republic_id);
        $this->republic_id = $republic_id;
        $this->save();
    }

    public function removeRent($republic_id) {
        $republic = Republic::findOrFail($republic_id);
        $this->republic_id = NULL;
        $this->save();
    }

    /*
     * Relationship One to Many
     * User announces Republic
     * User can announce n Republics
     */
    public function republics() {
        return $this->hasMany('App\Republic');
    }

    /*
     * Relationship Many to Many
     * User favorites Republic
     * User can favorite n Republics
     */
    public function favorites() {
      return $this->belongsToMany('App\Republic');
    }

    /*
     * Relationship One to Many
     * User post Comment
     * User can post n Comments
     */
    public function comments() {
        return $this->hasMany('App\Comments');
    }

    /*
     * CRUD functions
     * create & update
     */
    public function createUser(UserRequest $request) {
      $this->nickname = $request->nickname;
      $this->email = $request->email;
      $this->password = $request->password;
      $this->street = $request->street;
      $this->number = $request->number;
      $this->neighborhood = $request->neighborhood;
      $this->city = $request->city;
      $this->phone = $request->phone;
      $this->date_birth = $request->date_birth;
      $this->cpf = $request->cpf;
      $this->payment = $request->payment;
      $this->can_post = $request->can_post;

      $this->save();;
    }

    public function updateUser(Request $request) {
      if($request->nickname){
          $this->nickname = $request->nickname;
      }
      if($request->email){
        $this->email = $request->email;
      }
      if($request->password){
        $this->password = $request->password;
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
      if($request->phone){
        $this->phone = $request->phone;
      }
      if($request->date_birth){
        $this->date_birth = $request->date_birth;
      }
      if($request->cpf){
        $this->cpf = $request->cpf;
      }
      if($request->payment){
        $this->payment = $request->payment;
      }
      if($request->can_post){
        $this->can_post = $request->can_post;
      }

      $this->save();
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
  }

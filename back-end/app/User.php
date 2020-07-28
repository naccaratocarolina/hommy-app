<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Republics;
use App\Comments;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relationships
    public function republics() {
        return $this->hasMany('App\Republic');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function tenantUser() {
      return $this->hasOne('App\User');
    }

    public function favorites() {
      return $this->belongsToMany('App\Republic');
    }

    //Methods
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

      //saving
      $this->save();;
    }

    public function updateUser(UserRequest $request, $id) {
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

    public function rent($user_id, $republic_id) {
      $republic = Republic::findOrFail($id);
      $this->republic_id = $republic_id;
      $this->save();

      return response()->json($user);
    }
  }

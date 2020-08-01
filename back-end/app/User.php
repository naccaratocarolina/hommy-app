<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\CommentRequest;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Comment;
use App\Republic;

class User extends Authenticatable {
    use Notifiable;
    use HasApiTokens;
    
    //Soft Delete
    use SoftDeletes;
    protected $dates = ['deleted_at'];

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
        return $this->hasMany('App\Comment');
    }

    /*
     * CRUD functions
     * create & update
     */
    public function createUser(UserRequest $request) {
      $this->name = $request->name;
      $this->email = $request->email;
      $this->password = bcrypt($request->password);
      $this->address = $request->address;
      $this->phone = $request->phone;
      $this->date_birth = $request->date_birth;
      $this->cpf = $request->cpf;
      $this->payment = $request->payment;

      $this->save();;
    }

    public function updateUser(Request $request) {
      if($request->name){
          $this->name = $request->name;
      }
      if($request->email){
        $this->email = $request->email;
      }
      if($request->password){
        $this->password = bcrypt($request->password);
      }
      if($request->address){
        $this->address = $request->address;
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

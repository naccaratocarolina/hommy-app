<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Users;
use App\Comments;

class Republic extends Model {
  //a republic is created by one and only user
  public function users() {
      return $this->belongsToMany(App\User);
  }

  //a republic can have n comments
  public function comments() {
      return $this->hasMany(App\Comment);
  }
}

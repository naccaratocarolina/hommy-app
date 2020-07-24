<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Republic;

class Comment extends Model {
  //a comment is made by one and only user
  public function users() {
      return $this->belongsTo('App\User');
  }

  //a comment is displayed at one and only republic page
  public function republics() {
      return $this->belongsTo('App\Republic');
  }
}

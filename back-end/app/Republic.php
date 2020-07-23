<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Users;
use App\Comments;

class Republic extends Model {
  public function users() {
      return $this->belongsTo(App\User);
  }

  public function comments() {
      return $this->hasMany(App\Comment);
  }
}

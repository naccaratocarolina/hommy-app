<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Republic extends Model {
  public function users() {
      return $this->belongsTo(App\User);
  }

  public function comments() {
      return $this->hasMany(App\Comment);
  }
}

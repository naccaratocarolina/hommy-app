<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Republic;

class Comment extends Model {
  public function users() {
      return $this->belongsTo(App\User);
  }

  public function republics() {
      return $this->belongsTo(App\Republic);
  }
}

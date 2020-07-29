<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\User;
use App\Republic;

class Comment extends Model {
  /*
   * Relationship One to Many
   * User post Comment
   * A Comment is made by 1 User
   */
   public function user() {
     return $this->belongsTo('App\User');
   }

   /*
    * Relationship One to Many
    * Republic owns Comment
    * A Comment belongs to 1 Republic
    */
    public function republic() {
      return $this->belongsTo('App\Republic');
    }

    public function owns($republic_id) {
      $republic = Republic::findOrFail($republic_id);
      $this->republic_id = $republic_id;
      $this->save();
    }

   /*
    * CRUD functions
    * create & update
    */
   public function createComment(CommentRequest $request) {
      $this->text = $request->text;

      $this->save();;
    }

   public function updateComment(Request $request) {
     if($request->text){
      $this->text = $request->text;
      }

      $this->save();
   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Comment;
use App\Republic;

class CommentController extends Controller {
  //user make a comment
  public function userMakeComment(Request $request, $user_id) {
    $comment = new Comment;
    $user = User::findOrFail($user_id);

    //attributes
    $comment->text = $request->text;

    //creating the relationship & saving
    $comment->user_id = $user_id;
    $comment->save();

    return response()->json([$comment, 'Comentario & Relacao criada com sucesso!']);
  }

  //list all comments existing
  public function listAllComments() {
    $comment = Comment::all();

    return response()->json([$comment]);
  }

  //list the comments made by an especific user
  public function findCommentByUser($user_id) {
    $user = User::findOrFail($user_id);

    return response()->json([$user->comments]);
  }

  //user updates an existing comment
  public function userUpdateComment(Request $request, $id, $user_id) {
    $comment = Comment::findOrFail($id);
    $user = User::findOrFail($user_id);

    $comments = $user->comments;
    //relationship validation
    foreach($comments as $user_comment) {
      if($user_comment->id == $id) { //check if the comment with the $id has relation with the $user_id
        $user_comment->text = $request->text; //if yes, update text attribute
        $user_comment->save();
        return response()->json([$user_comment, 'Comentario atualizado com sucesso!']);
      }
    }

    //if the comment has no relation with the user_id given, return an error
    return response()->json(['Voce nao tem permissao para editar esse comentario!']);
  }

  //user deletes an existing republic (destroy relationship between user & republic)
  public function userDeleteComment($id, $user_id) {
    $comment = Comment::findOrFail($id);
    $user = User::findOrFail($user_id);

    //deleting the relationship & the comment itself
    Comment::destroy($id);
    $comment->user_id = NULL;
    $comment->save();

    return response()->json([$comment, 'Comentario & Relacao deletada com sucesso!']);
  }
}

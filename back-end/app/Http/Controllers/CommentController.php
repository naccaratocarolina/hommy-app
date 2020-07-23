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

  //list all comments
  public function listComments() {
    $comment = Comment::all();

    return response()->json([$comment]);
  }
/*
  //list all comments
  public function findCommentByUser(Request $request, $user_id) {
    $user = User::findOrFail($user_id);

    if($comment) {
      if($comment->user_id == $user_id) {
        $comment = Comment::all();
      }
      return response()->json([$comment]);
    }
    else {
      return response()->json(['Este User nao fez nenhum comentario ainda!']);
    }
  }
*/
  //user updates an existing comment
  public function updateComment(Request $request, $id, $user_id) {
    $comment = Comment::findOrFail($id);
    $user = User::findOrFail($user_id);

    //validating request
    if($comment){
      if($comment->text){
        $comment->text = $request->text;
      }
        $comment->save();
        return response()->json([$comment, 'Comentario atualizada com sucesso!']);
      }
      else {
        return response()->json(['Este comentario nao existe']);
      }
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

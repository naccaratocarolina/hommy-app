<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

use App\User;
use App\Comment;
use App\Republic;

class CommentController extends Controller {
  /*
   * Relationship One to Many
   * User post Comment
   * A Comment is made by 1 User
   */

   public function post(Request $request) {
     $comment = new Comment;
     $comment->text = $request->text;
     $comment->user_id = $request->user_id;
     $comment->republic_id = $request->republic_id;
     $comment->save();
     return response()->json($comment);
   }

   public function postedBy($id) {
     $comment = Comment::findOrFail($id);
     return response()->json($comment->user);
   }

   public function findCommentByUser($user_id) {
    $user = User::findOrFail($user_id);
    return response()->json([$user->comments]);
  }

  public function userUpdateComment(CommentRequest $request, $id, $user_id) {
    $comment = Comment::findOrFail($id);
    $user = User::findOrFail($user_id);

    $comments = $user->comments;
    foreach($comments as $user_comment) {
      if($user_comment->id == $id) { //check if the comment with the $id has relation with the $user_id
        $user_comment->text = $request->text; //if yes, update text attribute
        $user_comment->save();
        return response()->json([$user_comment, 'Comentario atualizado com sucesso!']);
      }
    }
    return response()->json(['Voce nao tem permissao para editar esse comentario!']);
  }

  public function userDeleteComment($id, $user_id) {
    $comment = Comment::findOrFail($id);
    $user = User::findOrFail($user_id);

    //check if the comment belongs to user
    $comments = $user->comments;
    foreach($comments as $user_comment) {
      if($user_comment->id == $id) {
        Comment::destroy($id);
        $comment->user_id = NULL;
        $comment->save();
        return response()->json([$comment, 'Comentario & Relacao deletada com sucesso!']);
      }
    }

    return response()->json(['Voce nao tem permissao para editar esse comentario!']);
  }

   /*
    * Relationship One to Many
    * Republic owns Comment
    * A Comment belongs to 1 Republic
    */
    public function ownedBy($id) {
      $comment = Comment::findOrFail($id);
      return response()->json($comment->republic);
    }

    public function removesCommentFromRepublic($id, $republic_id) {
        $comment = Comment::findOrFail($id);
        $republic = Republic::findOrFail($republic_id);

        $comments = $republic->comments;
        foreach($comments as $republic_comment) { //check if the comment has relation with the republic
        if($republic_comment->id == $id) { //if yes, remove the relationtioship
            $comment->republic_id = NULL;
            $comment->save();
            return response()->json([$comment, 'Relacao deletada com sucesso!']);
        }
      }

        return response()->json(['Voce nao tem permissao para realizar essa acao!']);
    }

   /*
    * Basic CRUD for Comment
    * create, find, list, update, delete
    */
    //creates a new comment
    public function createComment(CommentRequest $request) {
      $comment = new Comment;
      $comment->createComment($request);
      return response()->json($comment);
    }

    //find an especific comment by id
    public function findComment(Request $request, $id){
      $comment = Comment::findOrFail($id);
      return response()->json($comment);
    }

    //list all comments
    public function listComment(Request $request){
      $comment = Comment::all();

      return response()->json([$comment]);
    }

    //update an existing comment
    public function updateComment(CommentRequest $request, $id) {
      $comment = Comment::find($id);
      $comment->updateComment($request);
      return response()->json([$comment, 'Comentario atualizado com sucesso!']);
    }

    //deletes an existing comment
    public function deleteComment(Request $request, $id){
      Comment::destroy($id);

      return response()->json(['Comentario deletado com sucesso!']);
    }
}

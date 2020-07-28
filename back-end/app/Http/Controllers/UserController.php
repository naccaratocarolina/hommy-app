<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\User;
use App\Republic;

class UserController extends Controller {
  //creates a new user
  public function createUser(UserRequest $request) {
    $user = new User;
    $user->createUser($request);
    return response()->json([$request, 'User criado com sucesso!']);
  }

  //find an especific user by id
  public function findUser(Request $request, $id){
    $user = User::findOrFail($id);
    return response()->json($user);
  }

  //list all users
  public function listUser(Request $request){
    $user = User::all();

    return response()->json([$user]);
  }

  //update an existing user
  public function updateUser(UserRequest $request, $id) {
    $user = User::find($id);
    $user->updateUser($request);
    return response()->json([$request, 'User atualizado com sucesso!']);
  }

  //deletes an existing user
  public function deleteUser(Request $request, $id){
    User::destroy($id);

    return response()->json(['User deletado com sucesso!']);
  }

  public function rent($user_id, $republic_id) {
    $user = User::findOrFail($user_id);
    $user->rent($republic_id);

    return response()->json($user);
  }

  public function announce($user_id, $republic_id) {
    $republic = Republic::findOrFail($republic_id);
    $user->announce($user_id);

    return response()->json($republic);
  }
}

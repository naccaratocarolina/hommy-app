<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Republic;

class UserController extends Controller {
  public function createUser(Request $request) {
    //creating a User object called user
    $user = new User;

    //attributes
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->street = $request->street;
    $user->number = $request->number;
    $user->state = $request->state;
    $user->city = $request->city;
    $user->phone = $request->phone;
    $user->date_birth = $request->date_birth;
    $user->cpf = $request->cpf;
    $user->payment = $request->payment;
    $user->can_post = $request->can_post;

    //saving
    $user->save();

    //returning json
    return response()->json([$user], 'User criado com sucesso!');
  }

  //find an especific user by id
  public function findUser(Request $request, $id){
    $user = User::findOrFail($id);
    return response()->json([$user]);
  }

  //list all users
  public function listUser(Request $request){
    $paginator = User::paginate(10);
    $user = UserResource::collection($paginator);
    $last = $paginator -> lastPage();

    return response()->json([$user,$last]);
  }

  //deletes an user
  public function deleteUser(Request $request, $id){
    $user = User::findOrFail($id);
    Storage::delete($user->profile_picture);
    User::destroy($id);
    return response()->json(['User deletado com sucesso!']);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Republic;

class UserController extends Controller {
  //creates a new user
  public function createUser(Request $request) {
    //creating a User object called user
    $user = new User;

    //attributes
    $user->nickname = $request->nickname;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->street = $request->street;
    $user->number = $request->number;
    $user->neighborhood = $request->neighborhood;
    $user->city = $request->city;
    $user->phone = $request->phone;
    $user->date_birth = $request->date_birth;
    $user->cpf = $request->cpf;
    $user->payment = $request->payment;
    $user->can_post = $request->can_post;

    //saving
    $user->save();

    //returning json
    return response()->json([$user, 'User criado com sucesso!']);
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
  public function updateUser(Request $request, $id) {
    $user = User::find($id);

    //validating request
    if($user){
      if($request->nickname){
        $user->nickname = $request->nickname;
      }
      if($request->email){
        $user->email = $request->email;
      }
      if($request->password){
        $user->password = $request->password;
      }
      if($request->street){
        $user->street = $request->street;
      }
      if($request->number){
        $user->number = $request->number;
      }
      if($request->neighborhood){
        $user->neighborhood = $request->neighborhood;
      }
      if($request->city){
        $user->city = $request->city;
      }
      if($request->phone){
        $user->phone = $request->phone;
      }
      if($request->date_birth){
        $user->date_birth = $request->date_birth;
      }
      if($request->cpf){
        $user->cpf = $request->cpf;
      }
      if($request->payment){
        $user->payment = $request->payment;
      }
      if($request->can_post){
        $user->can_post = $request->can_post;
      }
        $user->save();
        return response()->json([$user, 'User atualizado com sucesso!']);
      }
      else {
        return response()->json(['Este user nao existe']);
      }
  }

  //deletes an existing user
  public function deleteUser(Request $request, $id){
    User::destroy($id);

    return response()->json(['User deletada com sucesso!']);
  }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest as UserRequest;
use Illuminate\Support\Facades\Validator;
use App\Notifications\confirmaCadastro;
use App\User;

use Auth;
use DB;

class PassportController extends Controller {
  public function register(UserRequest $request) {
      $new_user = new User;
      $new_user->createUser($request);
      $success['token'] = $new_user->createToken('MyApp')->accessToken;
      //notification
      $new_user->notify(new confirmaCadastro());
      return response()->json(['success' => $success, 'user' => $new_user], 200);
    }

    public function login() {
      if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
        $user = Auth::user();
        $success['token'] = $user->createToken('MyApp')->accessToken;
        return response()->json(['success' => $success], 200);
      }
      else {
        return response()->json(['error' => 'Unauthorized', 'status' => 401]);
      }
    }

    public function getDetails() {
      $user = Auth::user();
      return response()->json(['user' => $user], 200);
    }

    public function logout() {
      $accessToken = Auth::user()->token();
      DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked' => true]);
      $accessToken->revoke();
      return response()->json(['Usuario deslogado com sucesso!'], 200);
    }
/*
Outras formas de fazer register e login
    public $successStatus = 200;

    public function register(UserRequest $request) {
      $new_user = new User;
      $new_user->name = $request->name;
      $new_user->email = $request->email;
      $new_user->password = bcrypt($request->password);
      $new_user->save();
      $token = $new_user->createToken('MyApp')->accessToken;
      $name = $new_user->name;
      return response()->json([
            "message" => "cadastro realizado com sucesso!",
            "data" => [
            'user' => $new_user,
            'token' =>$token
            ]
      ], 200);
    }

    public function login() {
      if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
        $user = Auth::user();
        $token = $user->createToken('MyApp')->accessToken;
        $name = $user->name;
        return response()->json([
          "message" => "login realizado com sucesso!",
          "data" => [
            'user' => $user,
            'token' => $token
            ]
          ], 200);
      }
      else {
        return response()->json([
          "message" => "email e senha invalidos!",
          "data" => [
            null
            ]
          ], 500);
        }
    }
*/
}

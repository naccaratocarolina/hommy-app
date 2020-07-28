<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RepublicRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\User;
use App\Republic;

class RepublicController extends Controller {
  //create a new republic
  public function createRepublic(RepublicRequest $request) {
    $republic = new Republic;
    $republic->createRepublic($request);

    return response()->json([$republic, 'Republica criada com sucesso!']);
  }

  //find a republic by id
  public function findRepublic($id) {
    $republic = Republic::findOrFail($id);
    return response()->json([$republic, 'Republica encontrada com sucesso!']);
  }

  //list all republics on the database
  public function listRepublic() {
    $republic = Republic::all();

    return response()->json([$republic]);
  }

  //update an existing republic
  public function updateRepublic(RepublicRequest $request, $id) {
    $republic = Republic::find($id);
    $republic->updateRepublic($request);
    return response()->json([$republic, 'Republica atualizada com sucesso!']);
  }

  //destroy/delete an existing republic
  public function deleteRepublic($id) {
    Republic::destroy($id);

    return response()->json(['Republica deletada com sucesso!']);
  }

  //user creates/announce a new republic (create relationship between user & republic)
  public function userAnnounceRepublic($id, $user_id) {
    $republic = Republic::findOrFail($id);
    $user = User::findOrFail($user_id);

    $republic->user_id = $user_id;
    $republic->save();

    return response()->json([$republic, 'Relacao criada com sucesso!']);
  }

  //user deletes an existing republic (destroy relationship between user & republic)
  public function userDeleteRepublic($id, $user_id) {
    $republic = Republic::findOrFail($id);
    $user = User::findOrFail($user_id);

    $republic->user_id = NULL;
    $republic->save();

    return response()->json([$republic, 'Relacao deletada com sucesso!']);
  }

  public function tenant($id) { //locatario, quem aluga
    $republic = Republic::findOrFail($id);
    $tenants = $republic->tenantUser()->get();

    return response()->json([$tenants, 'Locatarios localizados com sucesso!']);
  }

  public function owner($id) { //locador, dono da republica
    $republic = Republic::findOrFail($id);
    return response()->json([$republic->user, 'Dono da republica localizado com sucesso!']);
  }
}

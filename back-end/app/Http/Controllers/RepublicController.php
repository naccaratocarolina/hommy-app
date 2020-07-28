<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\User;
use App\Republic;
use App\Http\Requests\RepublicRequest;

class RepublicController extends Controller {
  //create a new republic
  public function createRepublic(RepublicRequest $request) {
    //creating a Republic object called republic
    $republic = new Republic;

    //attributes
    $republic->title = $request->title;
    $republic->street = $request->street;
    $republic->number = $request->number;
    $republic->neighborhood = $request->neighborhood;
    $republic->city = $request->city;
    $republic->imagem_1 = $request->imagem_1;
    $republic->imagem_2 = $request->imagem_2;
    $republic->imagem_3 = $request->imagem_3;
    $republic->category = $request->category;
    $republic->rental_per_month = $request->rental_per_month;
    $republic->footage = $request->footage;
    $republic->number_bath = $request->number_bath;
    $republic->number_bed = $request->number_bed;
    $republic->parking = $request->parking;
    $republic->animals = $request->animals;
    $republic->description = $request->description;

    //saving
    $republic->save();

    /*
    //validator
    $validator = Validator::make($request->all(), [
      'title' => 'required|string',
      'street' => 'required|string',
      'number' => 'required|integer',
      'neighborhood' => 'required|string',
      'city' => 'required|string',
      'category' => 'required|string',
      'rental_per_month' => 'required|numeric',
      'footage' => 'required|numeric'
    ]);

    if($validator->fails()) {
      return response()->json($validator->errors());
    }*/

    //returning json
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

    //validating request
    if($republic){
      if($request->title){
        $republic->title = $request->title;
      }
      if($request->street){
        $republic->street = $request->street;
      }
      if($request->number){
        $republic->number = $request->number;
      }
      if($request->neighborhood){
        $republic->neighborhood = $request->neighborhood;
      }
      if($request->city){
        $republic->city = $request->city;
      }
      if($request->imagem_1){
        $republic->imagem_1 = $request->imagem_1;
      }
      if($request->imagem_2){
        $republic->imagem_2 = $request->imagem_2;
      }
      if($request->imagem_3){
        $republic->imagem_3 = $request->imagem_3;
      }
      if($request->category){
        $republic->category = $request->category;
      }
      if($request->rental_per_month){
        $republic->rental_per_month = $request->rental_per_month;
      }
      if($request->footage){
        $republic->footage = $request->footage;
      }
      if($request->number_bath){
        $republic->number_bath = $request->number_bath;
      }
      if($request->number_bed){
        $republic->number_bed = $request->number_bed;
      }
      if($request->parking){
        $republic->parking = $request->parking;
      }
      if($request->animals){
        $republic->animals = $request->animals;
      }
      if($request->description){
        $republic->description = $request->description;
      }
        $republic->save();
        return response()->json([$republic, 'Republica atualizada com sucesso!']);
      }
      else {
        return response()->json(['Esta republica nao existe']);
      }
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
}

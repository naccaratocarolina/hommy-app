<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RepublicRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Resources\Republics as RepublicResource;

use App\User;
use App\Republic;

class RepublicController extends Controller {
  /*
   * Relationship One to One
   * User rents Republic
   * Republic can be rented by only 1 user
   */
    public function tenant($id) { //lista is locatarios
        $republic = Republic::findOrFail($id);
        $tenants = $republic->tenant()->get();
        return response()->json($tenants);
    }

    /*
     * Relationship One to Many
     * User announces Republic
     * A Republic can only be announced by 1 user
     */
    public function locator($id) { //locador
      $republic = Republic::findOrFail($id);
      return response()->json($republic->user);
    }

    /*
     * Relationship Many to Many
     * User favorites Republic
     * A Republic can be favorited by n Users
     */
     public function favoritedBy($id) {
       $republic = Republic::findOrFail($id);
       return response()->json($republic->favorites);
     }

    /*
     * Relationship One to Many
     * Republic owns Comment
     * Republic can own n Comments
     */
     public function owns($republic_id) {
       $republic = Republic::findOrFail($republic_id);
       $republic->owns($republic_id);
       return response()->json($comment);
     }

     public function listComments($id) {
       $republic = Republic::findOrFail($id);
       return response()->json($republic->comments);
     }

     /*
      * Basic CRUD for Republic
      * create, find, list, update, delete
      */

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
     public function updateRepublic(Request $request, $id) {
       $republic = Republic::find($id);
       $republic->updateRepublic($request);
       return response()->json([$republic, 'Republica atualizada com sucesso!']);
     }

     //destroy/delete an existing republic
     public function deleteRepublic($id) {
       Republic::destroy($id);

       return response()->json(['Republica deletada com sucesso!']);
     }

     /*
      * Busca com filtro para encontrar republicas usando queries do Eloquent
      *
      */
     public function filterRepublic(Request $request) {
       $republic = Republic::query();

       if($request->has('title')) {
         $republic->where('title', 'LIKE', '%' . $request->input('title') . '%');
       }

       if($request->has('address')) {
         $republic->where('address', 'LIKE', '%' . $request->input('address') . '%');
       }

       $query = $republic->orderBy('title', 'asc')->paginate(10);
       $aux = RepublicResource::collection($query);

       return response()->json($aux);
     }

     public function filterCategory(Request $request, $type) {
       $republics = Republic::with('category')->get();


     }

     /*
      * Retorna todas as republicas que foram soft deleted
      */
      public function findSoftDeletes() {
        $republics = Republic::onlyTrashed()->get();
        return response()->json($republics);
      }

/*
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
  }*/
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//UserController
Route::get('findUser/{id}','UserController@findUser');
Route::get('listUser','UserController@listUser');
Route::post('createUser','UserController@createUser');
Route::delete('deleteUser/{id}','UserController@deleteUser');

//RepublicController
Route::get('findRepublic/{id}','RepublicController@findRepublic');
Route::get('listRepublic','RepublicController@listRepublic');
Route::post('createRepublic','RepublicController@createRepublic');
Route::post('userAnnounceRepublic/{id}/{user_id}','RepublicController@userAnnounceRepublic');
Route::put('updateRepublic/{id}','RepublicController@updateRepublic');
Route::delete('deleteRepublic/{id}','RepublicController@deleteRepublic');
Route::delete('userDeleteRepublic/{id}/{user_id}','RepublicController@userDeleteRepublic');

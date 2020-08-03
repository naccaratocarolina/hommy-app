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
Route::get('listRepublics/{id}','UserController@listRepublics');
Route::post('createUser','UserController@createUser');
Route::post('rent/{user_id}/{republic_id}','UserController@rent');
Route::post('announce/{user_id}/{republic_id}','UserController@announce');
Route::post('favorite/{user_id}/{republic_id}','UserController@favorite');
Route::post('post/{user_id}','UserController@post');
Route::put('updateUser/{id}','UserController@updateUser');
Route::delete('deleteUser/{id}','UserController@deleteUser');
Route::delete('removeRent/{user_id}/{republic_id}','UserController@removeRent');
Route::delete('removeAnnounce/{user_id}/{republic_id}','UserController@removeAnnounce');
Route::delete('removeFavorite/{user_id}/{republic_id}','UserController@removeFavorite');

//RepublicController
Route::get('findRepublic/{id}','RepublicController@findRepublic');
Route::get('listRepublic','RepublicController@listRepublic');
Route::get('listUsers/{id}','RepublicController@listUsers');
Route::get('locator/{id}','RepublicController@locator');
Route::get('favoritedBy/{id}','RepublicController@favoritedBy');
Route::get('owns/{republic_id}','RepublicController@owns');
Route::get('listComments/{id}','RepublicController@listComments');
Route::get('listFavorites/{id}','RepublicController@listFavorites');
Route::get('tenant/{id}','RepublicController@tenant');
Route::get('findSoftDeletes','RepublicController@findSoftDeletes');
Route::get('filterRepublic','RepublicController@filterRepublic');
Route::get('commentCounter', 'RepublicController@commentCounter');
Route::post('commentsCounter/{id}','RepublicController@commentsCounter');
Route::post('createRepublic','RepublicController@createRepublic');
Route::post('userAnnounceRepublic/{id}/{user_id}','RepublicController@userAnnounceRepublic');
Route::post('owns/{republic_id}','RepublicController@owns');
Route::put('updateRepublic/{id}','RepublicController@updateRepublic');
Route::delete('deleteRepublic/{id}','RepublicController@deleteRepublic');
Route::delete('userDeleteRepublic/{id}/{user_id}','RepublicController@userDeleteRepublic');

//CommentController
Route::get('findCommentByUser/{user_id}','CommentController@findCommentByUser');
Route::get('ownedBy/{id}','CommentController@ownedBy');
Route::get('findComment/{id}','CommentController@findComment');
Route::get('listComment','CommentController@listComment');
Route::post('createComment','CommentController@createComment');
Route::post('post/{id}','CommentController@post');
Route::post('postedBy/{id}','CommentController@postedBy');
Route::put('userUpdateComment/{id}/{user_id}','CommentController@userUpdateComment');
Route::put('updateComment/{id}','CommentController@updateComment');
Route::delete('userDeleteComment/{id}/{user_id}','CommentController@userDeleteComment');
Route::delete('removesCommentFromRepublic/{id}/{republic_id}','CommentController@removesCommentFromRepublic');
Route::delete('deleteComment/{id}','CommentController@deleteComment');

//Passport Routes
Route::post('register', 'API\PassportController@register');
Route::post('login', 'API\PassportController@login');
Route::group(['middleware' => 'auth:api'], function() {
  Route::post('logout', 'API\PassportController@logout');
  Route::post('getDetails', 'API\PassportController@getDetails');
});

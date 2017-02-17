<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api'], function()
{
  // Player routes


  // Route::post('players','PlayerController@store');
  // Route::get('players','PlayerController@index')->middleware('role:poc,admin');
  // Route::post('players/{id}','PlayerController@update')->middleware('role:admin');
  // Route::get('players/{id}','PlayerController@show')->middleware('role:poc,admin');

  // Team routes
  // Route::post('teams', 'TeamController@store')->middleware('role:admin');
  // Route::get('teams', 'TeamController@index')->middleware('role:admin,poc');
  // Route::post('teams/{id}', 'TeamController@update')->middleware('role:admin');
  // Route::get('teams/{id}', 'TeamController@show')->middleware('role:admin,poc');

  //test
  Route::post('teams', 'TeamController@store');
  Route::get('teams', 'TeamController@index');
  Route::post('teams/{id}', 'TeamController@update');
  Route::get('teams/{id}', 'TeamController@show');
  Route::get('players/noteam' , 'PlayerController@noTeam');
  Route::get('players/export/{type}','PlayerController@exportExcel');

  Route::post('players','PlayerController@store');
  Route::get('players','PlayerController@index');
  Route::post('players/{id}','PlayerController@update');
  Route::get('players/{id}','PlayerController@show');
  //Route::resource('roles','RoleController');
  Route::get('roles/admin','RoleController@getAdminId');
  Route::post('roles','RoleController@store');
  Route::get('roles/{id}','RoleController@show');
  Route::get('roles','RoleController@index');
  //end of test

  // Roles routes
  //Route::resource('roles','RoleController',['middleware' => 'role:admin']);

  //Users routes
  //Route::resource('users','UserController',['middleware' => 'role:admin']);
  Route::get('users/poc','UserController@poc');
  Route::post('users','UserController@store');
  Route::get('users','UserController@index');
  Route::get('users/{id}','UserController@show');

  Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
  Route::post('authenticate', 'AuthenticateController@authenticate');
  Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');

  Route::post('upload/image/{id}', 'SportControlle  r@upload');


  // Route::resource('positions', 'PositionController',
  //             ['only' => ['index', 'store', 'destroy']]);

  //position
  Route::get('position','PositionController@index');
  Route::post('position','PositionController@store');
  Route::get('position/{id}','PositionController@show');
  Route::get('position/{id}/players' , 'PositionController@players');

  //sports
  Route::get('sports','SportController@index');
  Route::post('sports','SportController@store');
  Route::get('sports/{id}','SportController@show');
  Route::get('sports/{id}/positions','SportController@positions');
  Route::get('sports/{id}/players' , 'SportController@players');

});

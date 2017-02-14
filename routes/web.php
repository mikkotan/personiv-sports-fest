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
  Route::post('players','PlayerController@store');
//   Route::get('players','PlayerController@index')->middleware('role:poc,admin');
Route::get('players','PlayerController@index');
  Route::post('players/{id}','PlayerController@update')->middleware('role:admin');
  Route::get('players/{id}','PlayerController@show')->middleware('role:poc,admin');


  // Team routes
  Route::post('teams', 'TeamController@store')->middleware('role:admin');
  Route::get('teams', 'TeamController@index')->middleware('role:admin,poc');
  Route::post('teams/{id}', 'TeamController@update')->middleware('role:admin');
  Route::get('teams/{id}', 'TeamController@show')->middleware('role:admin,poc');


  // Roles routes
  Route::resource('roles','RoleController',['middleware' => 'role:admin']);

  //Users routes
  Route::resource('users','UserController',['middleware' => 'role:admin']);

  Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);

  Route::post('authenticate', 'AuthenticateController@authenticate');

  Route::get('getAuthenticatedUser', 'AuthenticateController@getAuthenticatedUser');

  Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);

  Route::resource('positions', 'PositionController',
              ['only' => ['index', 'store', 'destroy']]);

  Route::resource('sports', 'SportController',
              ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

});

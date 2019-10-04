<?php

use Illuminate\Http\Request;

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

Route::post('/zagonlogstore', 'ApiController@zagonlogstore');   
Route::post('/otchets', 'ApiController@otchets');   
Route::get('/sheeps', 'ApiController@sheeps');   
Route::get('/getDay', 'ApiController@getDay');   
  
Route::get('/getHistory', 'ApiController@getHistory');   
   


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

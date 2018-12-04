<?php


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
//_token
Route::post('asd', 'API\UserController@login');
Route::get('asd', 'API\UserController@login');
//Route::get('login', 'UserController@login');


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//
//Route::post('register', 'API\UserController@register');
//
////json users in maps
//Route::post('/json',['uses'=>'Tools\ToolsController@importJson','as'=>'json']);
//Route::get('/json',['uses'=>'Tools\ToolsController@importJson','as'=>'json']);

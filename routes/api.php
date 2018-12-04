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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//_token
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

//json users in maps
Route::post('/json',['uses'=>'Tools\ToolsController@importJson','as'=>'json']);
Route::get('/json',['uses'=>'Tools\ToolsController@importJson','as'=>'json']);

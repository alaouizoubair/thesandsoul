<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array("as"=>"home","uses"=>"UserController@home"));
Route::get('/home', array("as"=>"home","uses"=>"UserController@home"));
Route::get('/suggestion/{name}', array("as"=>"user.suggestion","uses"=>"UserController@suggestion"));
Route::post('user/create',array('as'=>'user.create','uses'=>'UserController@create'));
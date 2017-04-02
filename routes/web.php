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

Route::get('/check', 'CURLController@checkToken');
Route::get('/',[
    'as' => 'homes.index',
    'uses' => 'HomeController@index'
]);




Route::get('/login','UserController@getLogin');
Route::post('/login',[
    'as'=>'post.login'   ,
    'uses'=>'UserController@postLogin'
]);
Route::get('/register','UserController@getRegister');
Route::post('/register',[
   'as' => 'post.register',
    'uses'=> 'UserController@postRegister'
]);
Route::get('/ListUser','UserController@ListUser');
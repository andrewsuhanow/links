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

/*Route::get('/', function () {
//    return view('welcome');

});*/



Route::get('/', ['as'=>'main','uses'=>'MainController@Main']);

Route::post('/', ['as'=>'post_save_db_link','uses'=>'MainController@PostSaveBDLink']);

//Route::post('/', ['as'=>'post_load_db_link','uses'=>'MainController@PostLoadBDLink']);

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

Route::get('/', function () {
    return view('index');
});

//Articulos
Route::get('/articulos','ArticuloController@index');
Route::POST('/articulos','ArticuloController@store');
Route::PUT('/articulos/{nombre}','ArticuloController@update');
Route::DELETE('/articulos/{nombre}','ArticuloController@destroy');

//Demonios
Route::get('/demonios','DemonioController@index');
Route::POST('/demonios','DemonioController@store');
Route::get('/demonios/{slug}','DemonioController@show');
Route::PUT('/demonios/{slug}','DemonioController@update');
Route::DELETE('/demonios/{slug}','DemonioController@destroy');

//Lugares
Route::get('/lugares','LugarController@index');
Route::POST('/lugares','LugarController@store');
Route::PUT('/lugares/{nombre}','LugarController@update');
Route::DELETE('/lugares/{nombre}','LugarController@destroy');

//Partesdelcuerpo
Route::get('/partesdelcuerpo','PartedelcuerpoController@index');
Route::POST('/partesdelcuerpo','PartedelcuerpoController@store');
Route::PUT('/partesdelcuerpo/{nombre}','PartedelcuerpoController@update');
Route::DELETE('/partesdelcuerpo/{nombre}','PartedelcuerpoController@destroy');

//Peleas
Route::get('/peleas','PeleaController@index');
Route::POST('/peleas','PeleaController@store');
Route::PUT('/peleas/{ganador}','PeleaController@update');
Route::DELETE('/peleas/{ganador}','PeleaController@destroy');

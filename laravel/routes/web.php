<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/login/sair', ['as'=>'login.sair', 'uses' => 'UserController@sair']);

Auth::routes();

Route::group(['middleware' => 'auth'], function (){

	Route::get('dashboard', ['as'=>'dashboard', 'uses' => 'DashboardController@index']);

    Route::get('/escolas', ['as'=>'schools', 'uses' => 'SchoolController@index']);
    Route::get('/escolas/adicionar', ['as'=>'schools.adicionar', 'uses' => 'SchoolController@adicionar']);
    Route::post('/escolas/salvar', ['as'=>'schools.salvar', 'uses' => 'SchoolController@salvar']);
    Route::get('/escolas/editar/{id}', ['as'=>'schools.editar', 'uses' => 'SchoolController@editar']);
    Route::put('/escolas/atualizar/{id}', ['as'=>'schools.atualizar', 'uses' => 'SchoolController@atualizar']);
    Route::get('/escolas/deletar/{id}', ['as'=>'schools.deletar', 'uses' => 'SchoolController@deletar']);

    Route::get('/classes', ['as'=>'classes', 'uses' => 'ClasseController@index']);
    Route::get('/classes/adicionar', ['as'=>'classes.adicionar', 'uses' => 'ClasseController@adicionar']);
    Route::post('/classes/salvar', ['as'=>'classes.salvar', 'uses' => 'ClasseController@salvar']);
    Route::get('/classes/editar/{id}', ['as'=>'classes.editar', 'uses' => 'ClasseController@editar']);
    Route::put('/classes/atualizar/{id}', ['as'=>'classes.atualizar', 'uses' => 'ClasseController@atualizar']);
    Route::get('/classes/deletar/{id}', ['as'=>'classes.deletar', 'uses' => 'ClasseController@deletar']);

    Route::get('/anos', ['as'=>'years', 'uses' => 'YearController@index']);
    Route::get('/anos/adicionar', ['as'=>'years.adicionar', 'uses' => 'YearController@adicionar']);
    Route::post('/anos/salvar', ['as'=>'years.salvar', 'uses' => 'YearController@salvar']);
    Route::get('/anos/editar/{id}', ['as'=>'years.editar', 'uses' => 'YearController@editar']);
    Route::put('/anos/atualizar/{id}', ['as'=>'years.atualizar', 'uses' => 'YearController@atualizar']);
    Route::get('/anos/deletar/{id}', ['as'=>'years.deletar', 'uses' => 'YearController@deletar']);

    Route::get('/avisos', ['as'=>'notices', 'uses' => 'NoticeController@index']);
    Route::get('/avisos/adicionar', ['as'=>'notices.adicionar', 'uses' => 'NoticeController@adicionar']);
    Route::post('/avisos/salvar', ['as'=>'notices.salvar', 'uses' => 'NoticeController@salvar']);
    Route::get('/avisos/editar/{id}', ['as'=>'notices.editar', 'uses' => 'NoticeController@editar']);
    Route::put('/avisos/atualizar/{id}', ['as'=>'notices.atualizar', 'uses' => 'NoticeController@atualizar']);
    Route::get('/avisos/deletar/{id}', ['as'=>'notices.deletar', 'uses' => 'NoticeController@deletar']);


	// Outros
	Route::get('estado/{id}', ['as'=>'states.cities', 'uses' => 'StateController@cidades']);
	Route::get('perfil', ['as'=>'user.perfil', 'uses' => 'UserController@perfil']);
	Route::put('/user/atualizar', ['as'=>'user.atualizar', 'uses' => 'UserController@atualizar']);
	Route::get('rolespermission', ['as'=>'rolespermission', 'uses' => 'UserController@rolespermission']);
});
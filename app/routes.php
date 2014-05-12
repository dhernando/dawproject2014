<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::any('/', function()
{
	return View::make('index');
});*/

/*Route::any('/perfil', function()
{
	return View::make('perfilgrupo.index');
});*/

Route::resource('/admin/grupo', 'GrupoController');
Route::resource('/admin/user', 'UserController');
Route::controller('/admin', 'AdminController');

Route::any('/register/confirmation', function()
{
  return View::make('register.confirm');
});

Route::post('/register', array(
  'uses' => 'RegisterController@store',
  'as' => 'register.store'
));

Route::get('/register', array('uses' => 'RegisterController@getIndex'));

Route::any('/perfil', array('uses' => 'PerfilController@getIndex'));

Route::controller('/', 'HomeController');
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

Route::group(array('before' => array('admin')), function()
{
	Route::resource('/admin/grupo', 'GrupoController');
	Route::resource('/admin/user', 'UserController');
	Route::resource('/admin/estadisticas', 'StatsController@estadisticas');
	Route::any('/admin/estadisticas/eliminar/{id}', array('uses' => 'StatsController@eliminar'));	
	//Route::any('/admin/estadisticas/borrar', 'StatsController@eliminar');
});

Route::controller('/admin', 'AdminController');

// FOLLOW CONTROLLER 
Route::any('/follow', array('uses' => 'FollowController@startfollow'));

//UNFOLLOW CONTROLLER
Route::any('/unfollow', array('uses' => 'UnfollowController@stopfollow'));

Route::any('/register/confirmation', function()
{
  return View::make('register.confirm');
});

Route::get('/register/verify/{confirmation}', 'RegisterController@verify');

Route::post('/register', array(
  'uses' => 'RegisterController@store',
  'as' => 'register.store'
));

Route::get('/register', array('uses' => 'RegisterController@getIndex'));

Route::any('/perfil/{perfilid}', array('uses' => 'PerfilController@getIndex'));
Route::any('/perfil', array('uses' => 'PerfilController@getIndex'));

Route::post('/editprofile', array(
  'uses' => 'HomeController@update',
  'as' => 'home.update'
));

Route::get('/api/v1/{band}', 'ApiController@getIndex');

Route::controller('/', 'HomeController');
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

Route::get('/', function()
{
	return View::make('index');
});

Route::resource('/admin/user', 'UserController');
Route::controller('/admin', 'AdminController');

Route::get('grupos', array('uses' => 'GruposController@mostrarGrupos'));

Route::get('grupos/nuevo', array('uses' => 'GruposController@nuevoGrupo'));
 
Route::post('grupos/crear', array('uses' => 'GruposController@crearGrupo'));
// esta ruta es a la cual apunta el formulario donde se introduce la información del usuario 
// como podemos observar es para recibir peticiones POST 
 
Route::get('grupos/{id}', array('uses'=>'GruposController@verGrupo'));
// esta ruta contiene un parámetro llamado {id}, que sirve para indicar el id del usuario que deseamos buscar 
// este parámetro es pasado al controlador, podemos colocar todos los parámetros que necesitemos 
// solo hay que tomar en cuenta que los parámetros van entre llaves {}
// si el parámetro es opcional se colocar un signo de interrogación {parámetro?}


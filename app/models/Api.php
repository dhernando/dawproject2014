<?php

class Api extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grupos';

	protected $hidden = array('id', 'imagen', 'created_at', 'updated_at', 'busquedas', 'busquedas_api');

	public static function getDades($grup)
    {
    	$dades = DB::select('SELECT nombre, descripcion, actividad, genero, origen, web, facebook, twitter, googleplus FROM grupos WHERE nombre = ?', array($grup));

    	if($dades) 
    	{
    		$dades_api = DB::select('SELECT * FROM grupos WHERE nombre = ?', array($grup));
    		DB::update('UPDATE grupos SET busquedas_api = ? WHERE nombre = ? ', array( $dades_api[0]->busquedas_api+1, $grup));
    	}

    	return $dades;
    }

}

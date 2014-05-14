<?php

class Favorito extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'favoritos';

	public static function getFavs($id)
	{
		$favoritos = DB::table('favoritos')->join('grupos', 'favoritos.id_grupo', '=','grupos.id')->where('favoritos.id_usuario', '=', $id)->get(array('grupos.nombre'));

		return $favoritos;
	}

}
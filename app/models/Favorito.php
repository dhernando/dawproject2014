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

	public static function unfollow($userid, $idgrupo)
	{
		DB::delete('DELETE FROM favoritos WHERE id_usuario = ? and id_grupo = ?', array($userid, $idgrupo));
	}

	public static function follow($userid, $idgrupo)
	{
		DB::insert('insert into favoritos (id_usuario, id_grupo) values (?, ?)', array($userid, $idgrupo));
	}

	public static function favsgroup($idgrupo)
	{
		return DB::select('SELECT COUNT(*) AS cantidad FROM favoritos WHERE id_grupo = ?', array($idgrupo));
	}

}
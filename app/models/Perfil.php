<?php

class Perfil extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grupos';

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */

	public function getFullName()
    {
        return $this->nombre . ' ' . $this->descripcion;
    }

    public static function getDades($grup)
    {
    	return DB::table('grupos')->where('nombre', '=', $grup)->get();
    }

}

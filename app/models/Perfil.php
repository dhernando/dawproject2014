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
    	$dades = DB::select('SELECT * FROM grupos WHERE nombre = ?', array($grup));

    	if($dades) DB::update('UPDATE grupos SET busquedas = ? WHERE nombre = ? ', array( $dades[0]->busquedas+1, $grup));

    	return DB::table('grupos')->where('nombre', '=', $grup)->get();
    }

}

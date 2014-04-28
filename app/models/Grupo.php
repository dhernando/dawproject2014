<?php

class Grupo extends Eloquent {

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

}

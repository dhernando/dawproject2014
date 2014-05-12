<?php

class RegisterController extends BaseController {

    public $restful = true;  

	public function getIndex()
	{
		return View::make('register.index');
	}

	public function store()
    {
        $user = new User;
 
        $user->nombre = Input::get('nombre');
        $user->apellido = Input::get('apellido');
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
 
        $user->save();

        return Redirect::to('/register/confirmation');
    }

}

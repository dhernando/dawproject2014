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

        $confirmation = str_random();

        $user->confirmation = $confirmation;
        $user->confirmed = 0;
 
        $user->save();

        Mail::send('mails.welcome', array('nombre'=>Input::get('nombre'), 'confirmation' => $confirmation), function($message){
            $message->to(Input::get('email'), Input::get('nombre').' '.Input::get('apellido'))->subject('Welcome to Crescendo!');
        });

        return Redirect::to('/register/confirmation');
    }

    public function verify($confirmation){

        $confirm = User::confirmUser($confirmation);

        if($confirm== true)
        {
            return 'Congratulations, your account has been activated.';
        }
        else if($confirm == false)
        {
            return 'Invalid confirmation code.';
        }
    }

}

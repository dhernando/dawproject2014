<?php

class RegisterController extends BaseController {

    public $restful = true;  

	public function getIndex()
	{
		return View::make('register.index');
	}

	public function store()
    {

        $datos = array(
            'nombre' => Input::get('nombre'), 
            'apellido' => Input::get('apellido'), 
            'username' => Input::get('username'), 
            'email' => Input::get('email'),
            'image' => Input::file('image'),
            'password' => Input::get('password'), 
            'password_confirmation' => Input::get('password_confirmation')
        );

        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'image' => 'image',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        );

        if($validator->fails())
        {
            return Redirect::to('/register')
            ->withErrors($validator);
        }

        else
        {

            $user = new User;
     
            $user->nombre = Input::get('nombre');
            $user->apellido = Input::get('apellido');
            $user->username = Input::get('username');
            $user->email = Input::get('email');

            $file = Input::file('image');
     
            $destinationPath = 'uploads/users/'.AppHelper::clean($user->username);
            $filename = str_random();
            $upload_success = Input::file('image')->move($destinationPath, $filename.'.jpg');
             
            if( $upload_success ) {
                $user->imagen = $filename;
            }

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

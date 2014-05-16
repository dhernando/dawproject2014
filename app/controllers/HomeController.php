<?php

class HomeController extends BaseController {

	public function getIndex()
	{
        if (!Auth::guest())
        {
            $user_id=Auth::user()->getUser()->id;
            $favs = Favorito::getFavs($user_id);

            return View::make('home.index')->with('favs',$favs);
        }
        else
        {
            return View::make('home.index');
        }
	}

	public function postIndex()
    {
        $username = Input::get('username');
        $password = Input::get('password');
 
        if (Auth::attempt(['username' => $username, 'password' => $password, 'confirmed' => 1]))
        {
            
            return Redirect::to('/');
        }
 
        return Redirect::back()
            ->withInput()
            ->withErrors('User/Password combination doesnt\'t exist.');
        /*return Redirect::intended('/admin/user');*/
    }

    public function update()
    {
        $datos = array(
            'nombre' => Input::get('nombre'), 
            'apellido' => Input::get('apellido'),
            'email' => Input::get('unique:usuarios, email'),
            'image' => Input::file('image'),
            'password' => Input::get('password'), 
            'password_confirmation' => Input::get('password_confirmation')
        );

        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'unique:usuarios,email|required|email',
            'image' => 'image',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        );

        if($validator->fails())
        {
            return Redirect::back()
            ->withErrors($validator);
        }

        else{

            $user = User::find(Input::get('id'));

            $user->nombre = Input::get('nombre');
            $user->apellido = Input::get('apellido');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            $file = Input::file('image');
     
            $destinationPath = 'uploads/users/'.AppHelper::clean($user->username);
            $filename = str_random();
            $upload_success = Input::file('image')->move($destinationPath, $filename.'.jpg');
             
            if( $upload_success ) {
                $user->imagen = $filename;
            }
     
            $user->save();
     
            return Redirect::back();
        }
    }
 
    public function getLogin()
    {
        return Redirect::to('/');
    }
 
    public function getLogout()
    {
        Auth::logout();
 
        return Redirect::to('/');
    }

}

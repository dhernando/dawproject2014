<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		return View::make('home.index');
	}

	public function postIndex()
    {
        $username = Input::get('username');
        $password = Input::get('password');
 
        if (Auth::attempt(['username' => $username, 'password' => $password]))
        {
            return Redirect::intended('/');
        }
 
        return Redirect::back()
            ->withInput()
            ->withErrors('La combinación de usuario/contraseña no existe.');
        /*return Redirect::intended('/admin/user');*/
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

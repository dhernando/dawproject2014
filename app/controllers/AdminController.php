<?php
 
class AdminController extends BaseController {
 
    public function getIndex()
    {
        return View::make('admin.index');
    }
 
    public function postIndex()
    {
        $username = Input::get('username');
        $password = Input::get('password');
 
        if (Auth::attempt(['username' => $username, 'password' => $password]))
        {
            return Redirect::intended('/admin/user');
        }
 
        return Redirect::back()
            ->withInput()
            ->withErrors('La combinación de usuario/contraseña no existe.');
        /*return Redirect::intended('/admin/user');*/
    }
 
    public function getLogin()
    {
        return Redirect::to('/admin');
    }
 
    public function getLogout()
    {
        Auth::logout();
 
        return Redirect::to('/admin');
    }
 
}
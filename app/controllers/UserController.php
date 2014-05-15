<?php
 
class UserController extends BaseController {
 
    public function __construct()
    {
        $this->beforeFilter('auth');
    }
 
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
 
        return View::make('user.index', ['users' => $users]);
    }
 
    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('user.create');
    }
 
    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
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

        $validator = Validator::make($datos , $rules);

        if($validator->fails())
        {
            return Redirect::to('/admin/user/create')
            ->withErrors($validator);
        }

        else
        {
            $user = new User;
     
            $user->nombre = Input::get('nombre');
            $user->apellido  = Input::get('apellido');
            $user->username   = Input::get('username');
            $user->email      = Input::get('email');

            $file = Input::file('image');
 
            $destinationPath = 'uploads/users/'.AppHelper::clean($user->username);
            $filename = str_random();
            $upload_success = Input::file('image')->move($destinationPath, $filename.'.jpg');
             
            if( $upload_success ) {
                $user->imagen = $filename;
            }

            $user->password   = Hash::make(Input::get('password'));
     
            $user->save();

            return Redirect::to('/admin/user');
        }
    }
 
    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
 
        return View::make('user.edit', [ 'user' => $user ]);
    }
 
    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
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

        $validator = Validator::make($datos , $rules);

        if($validator->fails())
        {
            return Redirect::to('/admin/user/'.$id.'/edit')
            ->withErrors($validator);
        }

        else
        {

            $user = User::find($id);
     
            $user->nombre = Input::get('nombre');
            $user->apellido  = Input::get('apellido');
            $user->username   = Input::get('username');
            $user->email      = Input::get('email');

            $file = Input::file('image');
 
            $destinationPath = 'uploads/users/'.AppHelper::clean($user->username);
            $filename = str_random();
            $upload_success = Input::file('image')->move($destinationPath, $filename.'.jpg');
             
            if( $upload_success ) {
                $user->imagen = $filename;
            }

            $user->password   = Hash::make(Input::get('password'));
     
            $user->save();
     
            return Redirect::to('/admin/user');
        }
    }
 
    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);
 
        return Redirect::to('/admin/user');
    }

    public function name()
    {
        if ($this->username) {
            return $this->username;
        } else {
            return $this->nombre . ' ' . $this->apellido;
        }
    }
}
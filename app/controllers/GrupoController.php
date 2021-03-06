<?php 
class GrupoController extends BaseController {
 
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
        $grupos = Grupo::all();
 
        return View::make('grupo.index', ['grupos' => $grupos]);
    }
 
    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('grupo.create');
    }
 
    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store()
    {
        $grupo = new Grupo;
 
        $grupo->nombre = Input::get('nombre');
        $grupo->descripcion  = Input::get('descripcion');

        $file = Input::file('image');
 
        $destinationPath = 'uploads/'.AppHelper::clean($grupo->nombre);
        $filename = str_random(12);
        $upload_success = Input::file('image')->move($destinationPath, $filename.'.jpg');
         
        if( $upload_success ) {
            $grupo->imagen = $filename;
            $grupo->save();
            
            return Redirect::to('/admin/grupo');
        } 
        else {
           return Response::json('error', 400);
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
        $grupo = Grupo::find($id);
 
        return View::make('grupo.edit', [ 'grupo' => $grupo ]);
    }
 
    /**
     * Update the specified grupo in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $grupo = Grupo::find($id);
 
        $grupo->nombre = Input::get('nombre');
        $grupo->descripcion  = Input::get('descripcion');

        $file = Input::file('image');
 
        $destinationPath = 'uploads/'.AppHelper::clean($grupo->nombre);
        $filename = str_random(12);
        //$filename = $file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension(); 
        $upload_success = Input::file('image')->move($destinationPath, $filename.'.jpg');
         
        if( $upload_success ) {
            $grupo->imagen = $filename;
            $grupo->save();
            
            return Redirect::to('/admin/grupo');
        } else {
           return Response::json('error', 400);
        }
 
        $grupo->save();
 
        return Redirect::to('/admin/grupo');
    }
 
    /**
     * Remove the specified grupo from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Grupo::destroy($id);
 
        return Redirect::to('/admin/grupo');
    }
 
}

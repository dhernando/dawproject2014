<?php 
class StatsController extends BaseController {
 
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function estadisticas()
    {
        /*if (!Auth::guest())
        {
            $user_id=Auth::user()->getUser()->id;
            $favs = Favorito::getFavs($user_id);
        }
        else
        {
            $favs = "";
        }*/
        $datos = Stats::mostWanted();
        return View::make('stats.index', ['datos' => $datos]);
        //return View::make('perfilgrupo.index', ['dades' => $dades, 'json' => $json, 'grupo' => $grupo])->with('favs',$favs);
    }

    public function eliminar($id)
    {
        
        Stats::delGrupo($id);
        return Redirect::to('/admin/estadisticas');
    }
    
}  

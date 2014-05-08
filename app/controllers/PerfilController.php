<?php 
class PerfilController extends BaseController {
 
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function getIndex()
    {
        if( isset($_POST['busqueda']) )
        {
            $busqueda = strtolower($_POST['busqueda']);

            //truncate - drop
            if ((strpos($busqueda,'delete') !== false) || (strpos($busqueda,'select') !== false) || (strpos($busqueda,'insert into') !== false) || (strpos($busqueda,'update') !== false)) {
                return View::make('perfilgrupo.error');
            }

            else{

            $dades = Perfil::getDades($busqueda);

            $artista_api = str_replace(" ", "%20", $busqueda);
            $artista_api = str_replace("/", "%252F", $artista_api);

            $api = file_get_contents('http://api.bandsintown.com/artists/'.$artista_api.'/events.json?api_version=2.0&app_id=YOUR_APP_ID');

            $json = json_decode($api);
 
            return View::make('perfilgrupo.index', ['dades' => $dades, 'json' => $json]);
            }
        }
    }  
 
}

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
            $grupo = ucfirst(strtolower($busqueda)); 
            $artista_api = str_replace(" ", "%20", $busqueda);
            $artista_api = str_replace("/", "%252F", $artista_api);

            if (AppHelper::get_http_response_code('http://api.bandsintown.com/artists/'.$artista_api.'/events.json?api_version=2.0&app_id=YOUR_APP_ID') != "404"){
                $api = file_get_contents('http://api.bandsintown.com/artists/'.$artista_api.'/events.json?api_version=2.0&app_id=YOUR_APP_ID');
            }else{
                $api = "";
            }


            $json = json_decode($api);
 
            $artista_api = ucfirst(strtolower($artista_api)); 

            return View::make('perfilgrupo.index', ['dades' => $dades, 'json' => $json, 'grupo' => $grupo]);
            }
        }
    }  
 
}

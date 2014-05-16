<?php 
class ApiController extends BaseController {
 
    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function getIndex($busqueda = null)
    {
        if($busqueda != null && $busqueda == 'all'){
            return Api::all()->toJson();
        }

        else if($busqueda !=null & $busqueda != 'all'){
            $dades = Api::getDades($busqueda);

            if($dades)
                return json_encode($dades);

            else
            {
                $error = array('errors' => array('Unknown Artist'));
                return json_encode($error);
            }
        }
        
    }  
 
}

<?php

class Stats extends Eloquent {

    public static function mostWanted()
    {
    	$datos = DB::select('SELECT * FROM busquedas ORDER BY busquedas DESC');

    	return $datos;
    }

    public static function getDades($grupo)
    {
    	$datosgrupo = DB::select('SELECT * FROM grupos WHERE nombre = ?', array($grupo));
    	$grupo = ucfirst(strtolower($grupo)); 
        if ($grupo != ""){ 
            if($datosgrupo) {
                $busqueda = DB::select('SELECT * FROM busquedas WHERE grupo = ?', array( $datosgrupo[0]->nombre));
                if ($busqueda) {
                    DB::table('busquedas')
                    ->where('grupo', $datosgrupo[0]->nombre)
                    ->update(array('busquedas' => $datosgrupo[0]->busquedas));
                }else {
                    DB::table('busquedas')->insert(
                        array('grupo' => $grupo, 'busquedas' => $datosgrupo[0]->busquedas, 'perfil' => 'si')
                    );
                }
            }else {
                $busqueda = DB::select('SELECT * FROM busquedas WHERE grupo = ?', array($grupo));
                if ($busqueda) {
                    DB::table('busquedas')
                    ->where('grupo', $busqueda[0]->grupo)
                    ->update(array('busquedas' => $busqueda[0]->busquedas+1));
                }else {
                    DB::table('busquedas')->insert(
                        array('grupo' => $grupo, 'busquedas' => 1)
                    );
                }
            }
        }
    	return;
    }

    public static function delGrupo($id)
    {
        return DB::table('busquedas')->where('id', $id )->delete();
    }

}

<?php

require("./dao/PeliculaDAO.php");

class PeliculaController extends Base{

    public static function peliculas(){

        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo){
            case 'GET':
                if(count($recursos) == 2 && count($filtros) == 0){
                    $datos = PeliculaDAO::findAll();
                }else if(count($recursos) == 2 && count($filtros) > 0){
                    self::buscaConFiltros();
                }
                $datos = json_encode($datos);
                self::response("HTTP/1.0 200 OK", $datos);
                break;
            case 'POST':
                break;
            case 'PUT':
                break;
            case 'DELETE':
                break;
            default:
                break;
        }

    }

    public static function buscaConFiltros(){
        $permitimos = ['titulo','genero'];
        $filtros = self::condiciones();

        foreach ($filtros as $key => $value) {
            if(!in_array($key,$permitimos)){
                self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
            }else{
                foreach ($permitimos as $campo => $valor) {
                    if($key == $valor){
                        if($key == 'titulo'){
                            $datos = PeliculaDAO::findByTitulo($value);
                        }else if($key == 'genero'){
                            $datos = PeliculaDAO::findByGenero($value);
                        }
                    }
                    if(!empty($datos)){
                        $datos = json_encode($datos);
                        self::response("HTTP/1.0 200 OK", $datos);
                    }
                }
            }
        }
    }
}

?>
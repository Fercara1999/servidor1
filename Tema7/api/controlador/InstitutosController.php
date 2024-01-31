<?php

require("./dao/institutoDAO.php");

class InstitutosController extends Base{

    public static function institutos(){
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if(count($recursos) == 2 && count($filtros) == 0){
                    $datos = InstitutoDAO::findAll();
                }else if(count($recursos) == 2 && count($filtros) > 0){
                    self::buscaConFiltros();
                }else if((count($recursos) == 3)){
                    $datos = InstitutoDAO::findbyId($recursos[2]);
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.0 200 OK', $datos);
                break;
            
            case 'POST':
                # code...
                break;

            case 'PUT':
                # code...
                break;

            case 'DELETE':
                # code...
                break;

            default:
                self::response("HTTP/1.0 400 No permite el metodo utilizado");
                break;
            
        }
    }

    static function buscaConFiltros(){
        // Comprobar si el nombre del filtro está permitido
        $permitimos = ['nombre','localidad'];
        $filtros = self::condiciones();

        foreach ($filtros as $key => $value) {
            if(!in_array($key,$permitimos)){
                self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
            }else{
            }
        }
    }
}

?>
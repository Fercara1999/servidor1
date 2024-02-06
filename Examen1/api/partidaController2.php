<?php

class PartidaController{

    // Obtiene el resultado de la peticion de la API
    public static function palabra(){
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if(count($recursos) == 2 && count($filtros) == 0){
                    $datos = PalabraDAO::obtenPalabra();
                }else if(count($recursos) == 2 && count($filtros) > 0){
                    $datos = self::buscaConFiltros();
                }
                
                $datos = json_encode($datos);
                self::response('HTTP/1.0 200 OK', $datos);
                break;
            default:
                self::response("HTTP/1.0 400 No permite el metodo utilizado");
                break;
            
        }
    }
    public static function response($head,$body = ''){
        // header('Content-Type: application/json');
        header($head, $body);
        echo $body;
        exit;
    }
    
    public static function divideURI(){
        $uri = $_SERVER['PATH_INFO'];
        return explode('/',$uri);
    }
    
    public static function condiciones(){
        parse_str($_SERVER['QUERY_STRING'],$filtros);
        return $filtros;
    }

    static function buscaConFiltros(){
        // Comprobar si el nombre del filtro está permitido
        $permitimos = ['num_letras'];
        $filtros = self::condiciones();

        foreach ($filtros as $key => $value) {
            if(!in_array($key,$permitimos)){
                self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
            }
        }

        return PalabraDAO::findbyFiltros($filtros);
    }
}



?>
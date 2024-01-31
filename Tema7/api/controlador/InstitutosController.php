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
                    $datos = self::buscaConFiltros();
                }else if((count($recursos) == 3)){
                    $datos = InstitutoDAO::findbyId($recursos[2]);
                }else{
                    self::response("HTTP/1.0 400 No esta indicando los recursos necesarios");
                    break;
                }
                $datos = json_encode($datos);
                self::response('HTTP/1.0 200 OK', $datos);
                break;
            
            case 'POST':
                $datos = file_get_contents('php://input');
                $datos = json_decode($datos,true);
                if(isset($datos['nombre'],$datos['localidad'],$datos['telefono'])){
                    $instituto = new Instituto (null,
                        $datos['nombre'],
                        $datos['localidad'],
                        $datos['telefono']
                    );
                    if(InstitutoDAO::insert($datos)){
                        $insti = InstitutoDAO::findLast();
                        $insti = json_encode($insti);
                        self::response('HTTP/1.0 201 Recurso creado', $insti);
                    }
                }else{
                    self::response('HTTP/1.0 400 No esta introduciendo los atributos de instituto(nombre, localidad, telefono');
                }
                break;
            case 'PUT':
                self::put();
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
            }
        }

        return InstitutoDAO::findbyFiltros($filtros);
    }

    static function put(){
        $recursos = self::divideURI();
        if(count($recursos) == 3){
            $permitimos = ['nombre','localidad','telefono'];
            $datos = file_get_contents('php://input');
            $datos = json_decode($datos,true);
            // Verificar que lo recibido en el body son los institutos
            foreach ($datos as $key => $value) {
                if(!in_array($key,$permitimos)){
                    self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
                }
            }
            $instituto = InstitutoDAO::findbyId($recursos[2]);
            if(count($instituto) == 1){
                $instituto = (object)$instituto[0];
                if(InstitutoDAO::update($instituto)){
                    self::response('HTTP/1.0 201 Recurso creado', $instituto);
                }else{
                    self::response('HTTP/1.0 400 No esta introduciendo los atributos de instituto(nombre, localidad, telefono');
                }
            }
        }else{
            self::response('HTTP/1.0 400 No ha indicado el id');
        }
    }
}

?>
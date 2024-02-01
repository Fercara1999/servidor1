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
                    $datos = self::buscaConFiltros();
                }else if((count($recursos) == 3)){
                    $datos = PeliculaDAO::findById($recursos[2]);
                }else{
                    self::response("HTTP/1.0 400 No está indicando los recursos necesarios");
                }
                $datos = json_encode($datos);
                self::response("HTTP/1.0 200 OK", $datos);
                break;

            case 'POST':
                $datos = file_get_contents("php://input");
                $datos = json_decode($datos,true);
                if(isset($datos['titulo'],$datos['director'],$datos['genero'])){
                    $pelicula = new Pelicula(null,
                    $datos['titulo'],
                    $datos['director'],
                    $datos['genero'],
                    1);
                    if(PeliculaDAO::insert($pelicula)){
                        $pelicula = PeliculaDAO::findLast();
                        $pelicula = json_encode($pelicula);
                        self::response('HTTP/1.0 201 Recurso creado', $pelicula);
                    }
                }else{
                    self::response('HTTP/1.0 400 No esta introduciendo los atributos de pelicula (titulo,director,genero');
                }
                break;
            case 'PUT':
                self::put();
                break;
            case 'DELETE':
                $recursos = self::divideURI();
                if(count($recursos) == 3){
                    if(!empty(PeliculaDAO::findById($recursos[2]))){
                        if(PeliculaDAO::delete($recursos[2])){
                            self::response("HTTP/1.0 200 Recurso eliminado");
                        }else{
                            self::response("HTTP/1.0 400 No se pudo eliminar el recurso");
                        }
                    }else{
                        self::response("HTTP/1.0 400 No se pudo localizar el recurso a eliminar");
                    }
                }else{
                    self::response("HTTP/1.0 400 No se ha indicado el id");
                }
                break;
            default:
                break;
        }

    }

    static function buscaConFiltros(){
        // Comprobar si el nombre del filtro está permitido
        $permitimos = ['titulo','genero'];
        $filtros = self::condiciones();

        foreach ($filtros as $key => $value) {
            if(!in_array($key,$permitimos)){
                self::response("HTTP/1.0 400 No se permite la condicion utilizada: " .$key);
            }else{
            }
        }

        return PeliculaDAO::findbyFiltros($filtros);
    }

    static function put(){
        $recursos = self::divideURI();
        if(count($recursos) == 3){
            $permitimos = ['titulo','director','genero'];
            $datos = file_get_contents('php://input');
            $datos = json_decode($datos,true);
            foreach ($datos as $key => $value) {
                if(!in_array($key,$permitimos)){
                    self::response("HTTP/1.0 400 No se permite la condicion utilizada" .$key);
                }
            }
            $pelicula = PeliculaDAO::findById($recursos[2]);
            if(count($pelicula) == 1){
                $pelicula = (object)$pelicula[0];
                if(PeliculaDAO::update($datos,$pelicula)){
                    $pelicula = PeliculaDAO::findById($recursos[2]);
                    $pelicula = json_encode($pelicula);
                    self::response("HTTP/1.0 201 Recurso modificado", $pelicula);
                }else{
                    self::response("HTTP/1.0 400 No esta introduciendo los atributos de la pelicula (titulo,director,genero)");
                }
            }else{
                self::response("HTTP/1.0 400 No se ha encontrado la pelicula con ese ID");
            }
        }else{
            self::response("HTTP/1.0 400 No se ha indicado el id");
        }

    }
}

?>
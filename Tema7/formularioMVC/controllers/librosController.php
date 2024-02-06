<?php

require("./dao/libroDAO.php");
// require("./dao/factoryBD.php");

// if(!sesionIniciada()){
//     $_SESSION['vista'] = VIEW.'home.php';
//     $_SESSION['controller'] = CON.'loginController.php';
// }else{
//     if(isset($_REQUEST['guardarLibro'])){
//         $erroresLibro = [];
//         if(validaFormularioLibro($erroresLibro)){
//             if(LibroDAO::inserta()){
//                 echo "Libro introducido con exito";
//             }else{
//                 echo "Error al introducir el libro";
//             }
//         }else{
//             echo "El formulario contiene errores";
//         }
//         $_SESSION['vista'] = VIEW . "home.php";
//     }
// }

class LibroController extends Base{
    public static function libros(){
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch ($metodo) {
            case 'GET':
                if(count($recursos) == 2 && count($filtros) == 0){
                    $datos = LibroDAO::findAll();
                }
                // else if(count($recursos) == 2 && count($filtros) > 0){
                //     $datos = self::buscaConFiltros();
                // }else if((count($recursos) == 3)){
                //     $datos = InstitutoDAO::findbyId($recursos[2]);
                // }else{
                //     self::response("HTTP/1.0 400 No esta indicando los recursos necesarios");
                //     break;
                // }
                $datos = json_encode($datos);
                self::response('HTTP/1.0 200 OK', $datos);
                break;
            
            // case 'POST':
            //     $datos = file_get_contents('php://input');
            //     $datos = json_decode($datos,true);
            //     if(isset($datos['nombre'],$datos['localidad'],$datos['telefono'])){
            //         $instituto = new Instituto (null,
            //             $datos['nombre'],
            //             $datos['localidad'],
            //             $datos['telefono']
            //         );
            //         if(InstitutoDAO::insert($datos)){
            //             $insti = InstitutoDAO::findLast();
            //             $insti = json_encode($insti);
            //             self::response('HTTP/1.0 201 Recurso creado', $insti);
            //         }
            //     }else{
            //         self::response('HTTP/1.0 400 No esta introduciendo los atributos de instituto(nombre, localidad, telefono');
            //     }
            //     break;
            // case 'PUT':
            //     self::put();
            //     break;

            // case 'DELETE':
            //     $recursos = self::divideURI();
            //     if(count($recursos) == 3){
            //         if(!empty(InstitutoDAO::findbyId($recursos[2]))){
            //             if(InstitutoDAO::delete($recursos[2])){
            //                 self::response('HTTP/1.0 200 Recurso eliminado');
            //             }else{
            //                 self::response('HTTP/1.0 400 No se pudo eliminar el recurso');
            //             }
            //         }else{
            //             self::response('HTTP/1.0 400 No se pudo localizar el recurso a eliminar');
            //         }
            //     }else{
            //         self::response('HTTP/1.0 400 No ha indicado el id');
            //     }
            //     break;

            default:
                self::response("HTTP/1.0 400 No permite el metodo utilizado");
                break;
            
        }
}
}


?>
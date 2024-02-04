<?php

require("./controllers/Base.php");

// if(isset($_REQUEST['creaResultados'])){
//     $_SESSION['vista'] = "./consumirAPI/index.php";
// }

// require("./dao/sorteoDAO.php");

if((isset($_REQUEST['creaResultados']))){
    $min = $_REQUEST['min'];
    $max = $_REQUEST['max'];

    header("Location: http://192.168.1.141/Tema7/Examen1/api/sorteos?min=$min&max=$max");
}

class SorteosController extends Base{

    public static function sorteos(){
        $metodo = $_SERVER['REQUEST_METHOD'];
        $recursos = self::divideURI();
        $filtros = self::condiciones();
        switch($metodo){
            case 'GET':
                if(count($recursos) == 2 && count($filtros) > 0){
                    $numerosSorteo = self::hazSorteo();
                    SorteoDAO::insert($numerosSorteo);
                }else{
                    self::response("HTTP/1.0 400 No esta indicando los recursos necesarios");
                    break;
                }
                $datos = json_encode($numerosSorteo);
                self::response('HTTP/1.0 200 OK', $datos);
                break;
        }
    }

    static function hazSorteo(){
        $filtros = self::condiciones();
        $arrayNumeros = [];
        for ($i=0; $i < 5 ; $i++) { 
            $n = mt_rand($filtros['min'],$filtros['max']);
            array_push($arrayNumeros, $n);
        }
        return $arrayNumeros;
    }
}
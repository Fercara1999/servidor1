<?php

// Clase para la palabraDAO
class PalabraDAO{

    // Obtenemos una palabra de la tabla de palabras
    // Ejemplo uso: http://192.168.7.202/Examen1/api.php/palabra
    public static function obtenPalabra(){
        // Hacemos que la palabra sea aleatoria
        $id_palabra = rand(1,90);
        $sql = "SELECT * FROM palabras WHERE id_palabra = ?";
        $parametros = array($id_palabra);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($palabraSTD = $result->fetchObject()){
            $palabra = array("id_palabra:".$palabraSTD->id_palabra,
            "palabra:".$palabraSTD->palabra,
            "longitud: ".$palabraSTD->num_letras,);
            return $palabra;
        }else{
            return null;
        }
    }

    // Obtenemos una palabra de la tabla de palabras según su longitud
    // Ejemplo uso: http://192.168.7.202/Examen1/api.php/palabra?num_letras=5 
    public static function findbyFiltros($filtros){
        
        // $num = count($filtros);
        $sql = "SELECT * FROM  palabras WHERE num_letras > ?";
        $parametros = array($filtros['num_letras']);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll();
    }

    // 
}
?>
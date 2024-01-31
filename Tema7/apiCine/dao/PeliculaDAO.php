<?php

require("./modelo/Pelicula.php");
require("./dao/factoryBD.php");

class PeliculaDAO{

    public static function findAll(){
        $sql = "SELECT * FROM peliculas WHERE activo = true";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id){

        $sql = "SELECT * FROM peliculas WHERE id = ? AND activo = true";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByTitulo($titulo){

        $sql = "SELECT * FROM peliculas WHERE titulo = ? AND activo = true";
        $parametros = array($titulo);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByGenero($genero){

        $sql = "SELECT * FROM peliculas WHERE genero = ? AND activo = true";
        $parametros = array($genero);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findbyFiltros($filtros){
        
        $num = count($filtros);
        $parametros = array();
        $sql = "SELECT * FROM peliculas WHERE ";
        
        foreach ($filtros as $key => $value) {
            if($key == 'titulo'){
                $sql .= $key ." LIKE ? ";
                $valor = '%'.$value.'%';
                array_push($parametros,$valor);
            }else{
                $sql .= $key ." = ? ";
                array_push($parametros,$value);
            }

            if($num == 2){
                $num--;
                $sql .= ' and ';
            }
        
        }

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
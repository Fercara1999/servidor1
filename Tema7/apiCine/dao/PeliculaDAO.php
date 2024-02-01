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

    public static function insert($datos){
        $sql = "INSERT INTO peliculas(titulo,director,genero,activo) VALUES (?,?,?,?)";
        $parametros = [$datos->titulo,$datos->director,$datos->genero,$datos->activo];

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }
    }

    public static function findLast(){
        $sql = "SELECT * from peliculas ORDER BY id DESC LIMIT 1";
        $parametros = [];

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }
    }

    public static function update($datos,$pelicula){
        $sql = "UPDATE peliculas SET titulo = ?, director = ?, genero = ? WHERE id = ?";
        $parametros = [$datos['titulo'],$datos['director'],$datos['genero'], $pelicula->id];

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($result->rowCount() > 0){
            return true;
        }
    }

    public static function delete($id){
        $sql = "DELETE FROM peliculas WHERE id = ?";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
            if($result->rowCount() > 0){
                return true;
            }
    }
    
}

?>
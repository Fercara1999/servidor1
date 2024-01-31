<?php

require("./modelo/Instituto.php");
require("./dao/factoryBD.php");

class InstitutoDAO{

    public static function findAll(){
        $sql = "SELECT * FROM institutos";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findbyId($id){
        
        $sql = "SELECT * FROM  institutos WHERE id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findLast(){
        $sql = "SELECT * FROM institutos ORDER BY id DESC LIMIT 1";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($instituto){
        $sql = "UPDATE institutos SET nombre = ?, localidad = ?, telefono = ? WHERE id = ?";
        $parametros = [$instituto['nombre'],$instituto['localidad'],$instituto['telefono'],$instituto['id']];
     
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }
    }

    public static function insert($datos){
        $sql = "INSERT INTO institutos(nombre, localidad, telefono) VALUES (?,?,?) ";
        $parametros = [$datos['nombre'], $datos['localidad'], $datos['telefono']];

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }

    }

    public static function findbyFiltros($filtros){
        
        $num = count($filtros);
        $parametros = array();
        $sql = "SELECT * FROM  institutos WHERE ";
        
        foreach ($filtros as $key => $value) {
            if($key == 'nombre'){
                $sql .= $key ." LIKE ?";
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
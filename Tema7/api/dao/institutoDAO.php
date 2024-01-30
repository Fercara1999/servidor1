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
}

?>
<?php

class ApuestaDAO{
    public static function insert($apuesta){
        $sql = "INSERT INTO Apuesta(codUsuario, numero1, numero2, numero3, numero4, numero5, activo) VALUES (?,?,?,?,?,?,?)";
        $parametros = array($apuesta->codUsuario,
        $apuesta->numero1,
        $apuesta->numero2,
        $apuesta->numero3,
        $apuesta->numero4,
        $apuesta->numero5,
        $apuesta->activo);

        $result = FactoryBD::realizaConsulta($sql, $parametros);
        return true;
    }

    public static function getElementByUsuario(){
        $sql = "SELECT * FROM Apuesta WHERE codUsuario = ?";
        $parametros = array($_SESSION['usuario']->codUsuario);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayApuestas = [];

        while($apuestaSTD = $result->fetchObject()){
            $apuesta = new Apuesta($apuestaSTD->id_apuesta,
            $apuestaSTD->codUsuario,
            $apuestaSTD->numero1,
            $apuestaSTD->numero2,
            $apuestaSTD->numero3,
            $apuestaSTD->numero4,
            $apuestaSTD->numero5,
            $apuestaSTD->fecha_apuesta,
            $apuestaSTD->activo);
            array_push($arrayApuestas, $apuesta);
        }

        return $arrayApuestas;
    }

    public static function getApuestaByID($id){

        $sql = "SELECT * FROM Apuesta WHERE id_apuesta = ?";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($apuestaSTD = $result->fetchObject()){
            $apuesta = new Apuesta($apuestaSTD->id_apuesta,
            $apuestaSTD->codUsuario,
            $apuestaSTD->numero1,
            $apuestaSTD->numero2,
            $apuestaSTD->numero3,
            $apuestaSTD->numero4,
            $apuestaSTD->numero5,
            $apuestaSTD->fecha_apuesta,
            $apuestaSTD->activo);
            return $apuesta;
        }

    }

    public static function getApuestaFindAll(){

        $sql = "SELECT * FROM Apuesta";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayApuestas = [];

        while($apuestaSTD = $result->fetchObject()){
            $apuesta = new Apuesta($apuestaSTD->id_apuesta,
            $apuestaSTD->codUsuario,
            $apuestaSTD->numero1,
            $apuestaSTD->numero2,
            $apuestaSTD->numero3,
            $apuestaSTD->numero4,
            $apuestaSTD->numero5,
            $apuestaSTD->fecha_apuesta,
            $apuestaSTD->activo);
            array_push($arrayApuestas, $apuesta);
        }

        return $arrayApuestas;
    }

    public static function update($apuesta){
        $sql = "UPDATE Apuesta SET numero1 = ?, numero2 = ?, numero3 = ?, numero4 = ?, numero5 = ? WHERE id_apuesta = ?";
        $parametros = array($apuesta->numero1,$apuesta->numero2,$apuesta->numero3,$apuesta->numero4,$apuesta->numero5,$apuesta->id_apuesta);

        $result = FactoryBD::realizaConsulta($sql, $parametros);

        if($result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}

?>
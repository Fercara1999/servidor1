<?php

class MultimediaDAO{
    public static function findAll(){
        $sql = "SELECT * FROM Multimedia WHERE activo = true";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);

        $arrayMultimedia = [];

        while($multimediaSTD = $result->fetchObject()){
            $multimedia = new Multimedia(
                $multimediaSTD->multimedia_id,
                $multimediaSTD->titulo,
                $multimediaSTD->duracion,
                $multimediaSTD->activo
            );
            array_push($arrayMultimedia,$multimedia);
        }

        return $arrayMultimedia;

    }
}

?>
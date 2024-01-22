<?php

class  AlbaranDAO{

    public static function findAll(){
        //return array con todos los libros
        $sql = "SELECT * FROM albaranes WHERE borrado = false";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arrayalbaranes = array();

        while($albaranSTD = $result->fetchObject()){
            $albaran = new Albaran($albaranSTD->codigoAlbaran,
            $albaranSTD->fechaAlbaran,
            $albaranSTD->ISBN_libro,
            $albaranSTD->cantidadIncremento,
            $albaranSTD->id_usuario,
            $albaranSTD->borrado);
            array_push($arrayalbaranes,$albaran);
        }

        return $arrayalbaranes;
    }

    public static function findbyId($id){
        
        $sql = "SELECT * FROM  albaranes WHERE codigoAlbaran = ? and borrado = 0";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($albaranSTD = $result->fetchObject()){
            $albaran = new Albaran($albaranSTD->codigoAlbaran,
            $albaranSTD->fechaAlbaran,
            $albaranSTD->ISBN_libro,
            $albaranSTD->cantidadIncremento,
            $albaranSTD->id_usuario,
            $albaranSTD->borrado);
            return $albaran;
        }else{
        }
    }

    public static function insert($albaran){
        $sql = "INSERT INTO albaran(codigoAlbaran,fechaAlbaran,ISBN_libro,cantidadIncremento,id_usuario,borrado) VALUES(?,?,?,?,?,?)";
        $parametros = array($albaran->codigoAlbaran,
        $albaran->fechaAlbaran,
        $albaran->ISBN_libro,
        $albaran->cantidadIncremento,
        $albaran->id_usuario,
        $albaran->borrado);
        // unset($parametros['fechaNacimiento']);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function update($albaran){
        $sql = 'UPDATE albaranes SET codigoAlbaran = ?,
        fechaAlbaran = ?
        ISBN_libro = ?,
        cantidadIncremento = ?,
        id_usuario = ?,
        borrado = ?
        WHERE codigoAlbaran = ?';
        
        $parametros = array($albaran->codigoAlbaran,
        $albaran->fechaAlbaran,
        $albaran->ISBN_libro,
        $albaran->cantidadIncremento,
        $albaran->id_usuario,
        $albaran->borrado);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function delete($albaran){
        $sql = "UPDATE albaranes SET borrado = true WHERE codigoAlbaran = ?";

        $parametros = array($albaran->codigoAlbaran);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function activar($usuario){
        $sql = "UPDATE albaranes SET borrado = false WHERE codigoAlbaran = ?";

        $parametros = array($albaran->codigoAlbaran);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

}

?>
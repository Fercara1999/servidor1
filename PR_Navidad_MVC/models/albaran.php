<?php

class Albaran{
    private $codigoAlbaran;
    private $fechaAlbaran;
    private $ISBN_libro;
    private $cantidadIncremento;
    private $id_usuario;
    private $borrado;

    function __construct($codigoAlbaran,$fechaAlbaran,$ISBN_libro,$cantidadIncremento,$id_usuario,$borrado = 'false'){
        $this->codigoAlbaran = $codigoAlbaran;
        $this->fechaAlbaran = $fechaAlbaran;
        $this->ISBN_libro = $ISBN_libro;
        $this->cantidadIncremento = $cantidadIncremento;
        $this->id_usuario = $id_usuario;
        $this->borrado = $borrado;
    }

    public function __get($att){
        if(property_exists(__CLASS__,$att))
            return $this->$att;
    }

    public function __set($att,$val){
        if(property_exists(__CLASS__,$att))
            $this->$att = $val;
        else{
            echo "No existe el att";
        }
    }
}

?>
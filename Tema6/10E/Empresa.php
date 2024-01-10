<?php

class Empresa{

    private $cif;
    private $nombre;
    private $localidad;

    function __construct($cif,$nombre,$localidad){
        $this->cif = $cif;
        $this->nombre = $nombre;
        $this->localidad = $localidad;
    }

    function getCif(){
        return $this->cif;
    }

    function getNombre(){
        return $this->nombre;
    }
    function getLocalidad(){
        return $this->localidad;
    }

    function setCif($cif){
        $this->cif = $cif;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function setLocalidad($localidad){
        $this->localidad = $localidad;
    }
}

?>
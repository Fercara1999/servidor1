<?php

class Gato extends Animal{
    private $pelaje;

    function __construct($nombre,$tipo,$pelaje){
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->pelaje = $pelaje;
    }
}
?>
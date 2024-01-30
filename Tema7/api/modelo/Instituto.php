<?php

class Instituto{
    private $id;
    private $nombre;
    private $localidad;
    private $telefono;

    public function __construct($id,$nombre,$localidad,$telefono){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->localidad = $localidad;
        $this->telefono = $telefono;
    }

    function __get($att){
        if(property_exists(__CLASS__,$att)){
            return $this->$att;
        }
    }

    function __set($att,$value){
        if(property_exists(__CLASS__,$att)){
            $this->$att = $value;
        }else{
            echo "No existe el atributo";
        }
    }
}

?>
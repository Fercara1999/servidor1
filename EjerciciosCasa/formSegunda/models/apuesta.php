<?php

class Apuesta{
    private $id_apuesta;
    private $codUsuario;
    private $numero1;
    private $numero2;
    private $numero3;
    private $numero4;
    private $numero5;
    private $fechaApuesta;
    private $activo;

    function __construct($id_apuesta,$codUsuario,$numero1,$numero2,$numero3,$numero4,$numero5,$fechaApuesta,$activo = 'true'){
        $this->id_apuesta = $id_apuesta;
        $this->codUsuario = $codUsuario;
        $this->numero1 = $numero1;
        $this->numero2 = $numero2;
        $this->numero3 = $numero3;
        $this->numero4 = $numero4;
        $this->numero5 = $numero5;
        $this->fechaApuesta = $fechaApuesta;
        $this->activo = $activo;
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

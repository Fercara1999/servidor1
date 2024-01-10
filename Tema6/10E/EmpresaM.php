<?php

class EmpresaM{

    public static $cont = 0;
    private $cif;
    private $nombre;
    private $localidad;

    static function saluda(){
        self::saluda1();
        return "Hola, soy Empresa";
    }

    static function saluda1(){
        echo "Hola, soy Empresa estática";
    }

    function __construct($cif,$nombre,$localidad){
        self::$cont ++;
        $this->cif = $cif;
        $this->nombre = $nombre;
        $this->localidad = $localidad;
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

    public function __toString(){
        return $this->cif. ":". $this->nombre .":". $this->localidad;
    }

}

?>
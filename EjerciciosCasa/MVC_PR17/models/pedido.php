<?php

class Pedido{
    private $idPedido;
    private $id_usuario;
    private $fechaPedido;
    private $ISBN;
    private $cantidad;
    private $precioTotal;
    private $borrado;

    function __construct($idPedido,$id_usuario,$fechaPedido,$ISBN,$cantidad,$precioTotal,$borrado = 'false'){
        $this->idPedido = $idPedido;
        $this->id_usuario = $id_usuario;
        $this->fechaPedido = $fechaPedido;
        $this->ISBN = $ISBN;
        $this->cantidad = $cantidad;
        $this->precioTotal = $precioTotal;
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
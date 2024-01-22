<?php

class PedidoDAO{

    public static function findAll(){
        //return array con todos los libros
        $sql = "SELECT * FROM pedidos WHERE borrado = false";
        $parametros = array();

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $arraypedidos = array();

        while($pedidoSTD = $result->fetchObject()){
            $pedido = new Pedido($pedidoSTD->idPedido,
            $pedidoSTD->id_usuario,
            $pedidoSTD->fechaPedido,
            $pedidoSTD->ISBN,
            $pedidoSTD->cantidad,
            $pedidoSTD->precioTotal,
            $pedidoSTD->borrado);
            array_push($arraypedidos,$pedido);
        }

        return $arraypedidos;
    }

    public static function findbyId($id){
        
        $sql = "SELECT * FROM pedidos WHERE idPedido = ? and borrado = 0";
        $parametros = array($id);

        $result = FactoryBD::realizaConsulta($sql,$parametros);

        if($pedidoSTD = $result->fetchObject()){
            $pedido = new Pedido($pedidoSTD->idPedido,
            $pedidoSTD->id_usuario,
            $pedidoSTD->fechaPedido,
            $pedidoSTD->ISBN,
            $pedidoSTD->cantidad,
            $pedidoSTD->precioTotal,
            $pedidoSTD->borrado);
            return $pedido;
        }else{
        }
    }

    public static function insert($pedido){
        $sql = "INSERT INTO pedidos(idPedido,id_usuario,fechaPedido,ISBN,cantidad,precioTotal,borrado) VALUES(?,?,?,?,?,?,?)";
        $parametros = array($pedido->idPedido,
            $pedido->id_usuario,
            $pedido->fechaPedido,
            $pedido->ISBN,
            $pedido->cantidad,
            $pedido->precioTotal,
            $pedido->borrado,);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function update($pedido){
        $sql = 'UPDATE pedidos SET idPedido = ?,
        id_usuario = ?
        fechaPedido = ?,
        ISBN = ?,
        cantidad = ?,
        precioTotal = ?,
        borrado = ?
        WHERE ISBN = ?';
        
        $parametros = array($pedido->idPedido,
        $pedido->id_usuario,
        $pedido->fechaPedido,
        $pedido->ISBN,
        $pedido->cantidad,
        $pedido->precioTotal,
        $pedido->borrado,);

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function delete($pedido){
        $sql = "UPDATE pedidos SET borrado = true WHERE idPedido = ?";

        $parametros = array($pedido->ISBN);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function activar($pedido){
        $sql = "UPDATE pedidos SET borrado = false WHERE idPedido = ?";

        $parametros = array($pedido->ISBN);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }
}

?>
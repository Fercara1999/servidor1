<?php

$erroresPedido = [];

if(isset($_REQUEST['modificarPedido'])){
    PedidoDAO::modificarPedido();
}else if(isset($_REQUEST['guardarCambiosPedido'])){
    if(PedidoDAO::guardaCambiosPedido()){
        $mensaje =  "Pedido modificado con exito";
    }
}else if(isset($_REQUEST['borrarPedido'])){
    if(PedidoDAO::borraPedido()){
        $mensaje =  "Pedido eliminado con exito";
    }
}else if(isset($_REQUEST['factura'])){
    require(VIEW.'creaFactura.php');
}

?>
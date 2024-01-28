<?php

$erroresPedido = [];

if(isset($_REQUEST['modificarPedido'])){
    PedidoDAO::modificarPedido();
}else if(isset($_REQUEST['guardarCambiosPedido'])){
    PedidoDAO::guardaCambiosPedido();
    $_SESSION['vista'] = VIEW.'home.php';
    echo "Pedido modificado con exito";
}else if(isset($_REQUEST['borrarPedido'])){
    PedidoDAO::borraPedido();
    $_SESSION['vista'] = VIEW.'home.php';
    echo "Pedido eliminado con exito";
}else if(isset($_REQUEST['factura'])){
    require(VIEW.'creaFactura.php');
}

?>
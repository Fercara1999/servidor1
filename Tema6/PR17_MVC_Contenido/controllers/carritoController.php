<?php

$con = new PDO(DSN,USER,PASSWORD);

if(isset($_REQUEST['explorar'])){
    $_SESSION['vista'] = VIEW.'home.php';
}else if(isset($_REQUEST['vaciar'])){
    $_SESSION['usuario']->carrito = '';
    $_SESSION['vista'] = VIEW.'home.php';
}else if(isset($_REQUEST['comprar'])){
    PedidoDAO::finalizarCompra();
}

?>
<?php

$con = new PDO(DSN,USER,PASSWORD);

if(isset($_REQUEST['explorar'])){
    $_SESSION['vista'] = VIEW.'home.php';
}else if(isset($_REQUEST['vaciar'])){
    $_SESSION['usuario']->carrito = '';
    $_SESSION['vista'] = VIEW.'home.php';
}else if(isset($_REQUEST['comprar'])){
    if(PedidoDAO::finalizarCompra()){
        $_SESSION['usuario']->carrito = "";
        $_SESSION['vista'] = VIEW.'finCompra.php';
    }else{
        $mensaje = '<div class="container mt-5 text-center"><h1 class="mb-4">No hay suficientes unidades disponibles para realizar la compra</h1></div>';
    }
}

?>
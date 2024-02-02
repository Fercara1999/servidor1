<?php

if(!empty($mensaje)){
    echo $mensaje;
}

PedidoDAO::misPedidos();

if(isAdmin() || isModerador()){
    PedidoDAO::verPedidos();
}

?>
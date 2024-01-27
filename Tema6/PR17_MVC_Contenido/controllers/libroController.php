<?php

$erroresLibro = [];

if(isset($_REQUEST['registrarNuevoLibro']) && validaLibro($erroresLibro)){
    LibroDAO::nuevoLibro();
}else if(isset($_REQUEST['registrarNuevoLibro'])){
    muestraErroresArray($erroresLibro);
}else if(isset($_REQUEST['modificarProducto'])){
    $_SESSION['vista'] = VIEW.'modificando.php';
    LibroDAO::modificarLibro();
}

?>
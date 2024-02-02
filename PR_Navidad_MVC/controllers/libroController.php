<?php

$erroresLibro = [];

if(isset($_REQUEST['registrarNuevoLibro']) && validaLibro($erroresLibro)){
    LibroDAO::nuevoLibro();
}else if(isset($_REQUEST['registrarNuevoLibro'])){
    muestraErroresArray($erroresLibro);
}else if(isset($_REQUEST['modificarProducto'])){
    LibroDAO::modificarLibro();
}else if(isset($_REQUEST['guardarCambiosProducto'])){
    if(LibroDAO::guardaCambiosProducto())
        $mensaje =  "Libro modificado con exito";
}else if(isset($_REQUEST['borrarProducto'])){
    if(LibroDAO::borraProducto())
        $mensaje = "Libro borrado con exito";
}else if(isset($_REQUEST['busqueda'])){
    $_SESSION['vista'] = VIEW.'busqueda.php';
}

?>
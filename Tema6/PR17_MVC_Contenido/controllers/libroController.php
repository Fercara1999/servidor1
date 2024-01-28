<?php

$erroresLibro = [];

if(isset($_REQUEST['registrarNuevoLibro']) && validaLibro($erroresLibro)){
    LibroDAO::nuevoLibro();
}else if(isset($_REQUEST['registrarNuevoLibro'])){
    muestraErroresArray($erroresLibro);
}else if(isset($_REQUEST['modificarProducto'])){
    LibroDAO::modificarLibro();
}else if(isset($_REQUEST['guardarCambiosProducto'])){
    LibroDAO::guardaCambiosProducto();
    $_SESSION['vista'] = VIEW.'home.php';
    echo "Libro modificado con exito";
}else if(isset($_REQUEST['borrarProducto'])){
    LibroDAO::borraProducto();
    $_SESSION['vista'] = VIEW.'home.php';
    echo "Libro borrado con exito";
}else if(isset($_REQUEST['busqueda'])){
    LibroDAO::buscarLibros($_REQUEST['busqueda']);
    $_SESSION['vista'] = VIEW.'busqueda.php';
}

?>
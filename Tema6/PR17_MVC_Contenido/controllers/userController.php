<?php

// if(isset($_REQUEST['modificar'])){
//     UserDAO::verDatos();
// }
    if(isset($_REQUEST['actualizar'])){
        UserDAO::actualizarDatos();
    }else if(isset($_REQUEST['actualizarContrasena'])){
        UserDAO::validaCambioContrasena();
    }else if(isset($_REQUEST['nuevoAlbaran'])){
        $_SESSION['controller'] = CON.'albaranController.php';
    }else if(isset($_REQUEST['nuevoLibro'])){
        $_SESSION['controller'] = CON.'libroController.php';
    }


?>
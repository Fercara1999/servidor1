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
    }else if(isset($_REQUEST['pedidos'])){
        $_SESSION['vista'] = VIEW.'pedidos.php';
        $_SESSION['controller'] = CON.'pedidoController.php';
    }else if(isset($_REQUEST['albaranes'])){
        $_SESSION['vista'] = VIEW.'albaranes.php';
        $_SESSION['controller'] = CON.'albaranController.php';
    }else if(isset($_REQUEST['productos'])){
        $_SESSION['vista'] = VIEW.'productos.php';
        $_SESSION['controller'] = CON.'libroController.php';
    }


?>
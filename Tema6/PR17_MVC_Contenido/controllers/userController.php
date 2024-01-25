<?php

// if(isset($_REQUEST['modificar'])){
//     UserDAO::verDatos();
// }
    if(isset($_REQUEST['actualizar'])){
        UserDAO::actualizarDatos();
    }else if(isset($_REQUEST['actualizarContrasena'])){
        UserDAO::validaCambioContrasena();
    }


?>
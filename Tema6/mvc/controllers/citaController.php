<?php

if(!validado())
    $arrayCitas = CitaDAO::buscarPorPaciente($_SESSION['usuario']);
    $_SESSION['vista'] = VIEW.'verCitas.php';
    

?>
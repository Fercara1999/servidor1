<?php

// Iniciamos sesión para que el navegador sepa cual es
session_start();
// Destruimos la sesión que hemos iniciado
session_destroy();
header("Location: ./home.php");
exit;
?>
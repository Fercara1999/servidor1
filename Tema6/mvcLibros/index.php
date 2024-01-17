<?php

require("./config/config.php");

echo "<pre>";
print_r(LibroDAO::FindAll());
// print_r(LibroDAO::FindByID('9780544003415'));
echo "</pre>";

// $juegoDeTronos = new Libro('1113111211111',"Choque de Reyes","George R R MArtin","Plaza Y Janes",'1999-10-08');
// LibroDAO::delete($juegoDeTronos);

// echo "<pre>";
// print_r(LibroDAO::buscaTitulo('sole'));
// echo "</pre>";
?>
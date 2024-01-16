<?php

require("./config/config.php");
session_start();

if(isset($_REQUEST['login'])){
    $_SESSION['vista'] = VIEW.'login.php';
}elseif(isset($_REQUEST['Home'])){
    $_SESSION['vista'] = VIEW.'home.php';
}
require("./views/layout.php");

// echo "<pre>";
// // $usuario = new User(1,sha1('fernando'),"fernando",'2024-01-11','usuario');
// // UserDAO::insert($usuario);
// // print_r(UserDAO::findAll());
// echo "<h1>FindByID</h1>";
// // print_r(UserDAO::findbyId(1));
// // echo "</pre>";
// // // $usuario = UserDAO::findById('2');
// // $usuario->descUsuario = "Ana";
// // $usuario = new User(3,sha1('ana'),"ana",'2024-01-11','usuario',1);
// // UserDAO::insert($usuario);
// // UserDAO::update($usuario);
// // UserDAO::delete($usuario);
// // print_r(UserDAO::findAll());
// print_r(UserDAO::buscarPorNombre('ernan'));
// print_r(UserDAO::validarUsuario('ana','ana'));

?>
<?php

require("./config/config.php");
session_start();

if(isset($_REQUEST['login'])){
    $_SESSION['vista'] = VIEW.'login.php';
    $_SESSION['controller'] = CON."loginController.php";
}elseif(isset($_REQUEST['Home'])){
    $_SESSION['vista'] = VIEW.'home.php';
}elseif(isset($_REQUEST['cerrarSesion'])){
    session_destroy();
    header('Location: ./index.php');
}elseif(isset($_REQUEST['verPerfil'])){
    $_SESSION['vista'] = VIEW.'verUsuario.php';
    $_SESSION['controller'] = CON."userController.php";
}elseif(isset($_REQUEST['verCitas'])){
    $_SESSION['vista'] = VIEW.'verCitas.php';
    $_SESSION['controller'] = CON.'citaController.php';
}elseif(isset($_REQUEST['pedirCita'])){
    $_SESSION['controller'] = CON.'userController.php';
}
if(isset($_SESSION['controller']))
    require($_SESSION['controller']);
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

// echo "<pre>";
// print_r(CitaDAO::findAll());
// print_r(CitaDAO::findByID(2));
// echo "</pre>";

// $cita = new Cita(5,"Trauma","Dolor de cabeza",'2024-02-01',111,1);
// CitaDAO::delete($cita);

// echo "<pre>";
// print_r(CitaDAO::findAll());
// echo "</pre>";

// $usuario = UserDAO::findById(9);

// echo "<pre>";
// print_r(CitaDAO::buscarPorPaciente($usuario));
// echo "</pre>";


?>
<?php

if(!validado()){
    $_SESSION['vista'] = VIEW.'login.php';
    $_SESSION['controller'] = CON.'loginController.php';
}else{
    if(isset($_REQUEST['editarCita'])){
        $_SESSION['vista'] = VIEW.'editarCita.php';
    }else if(isset($_REQUEST['guardarCambiosCita'])){
        if(!campoVacio('especialista') || !campoVacio('motivo') || !campoVacio('fecha')){
            $cita = CitaDAO::findbyId($_REQUEST['idCita']);
            $cita->especialista = $_REQUEST['especialista'];
            $cita->motivo = $_REQUEST['motivo'];
            $cita->fecha = $_REQUEST['fecha'];
            if(CitaDAO::update($cita)){
                $sms = "La cita se ha modificado correctamente";
                $_SESSION['vista'] = VIEW.'verCitas.php';
            }else
                $errores['update'] = "No se ha podido modificar la cita";
        }else{
            $errores['motivo'] = "Los campos de la cita no pueden estar vacios";
        }
    }else if(isset($_REQUEST['cancelarCita'])){
        $cita = CitaDAO::findbyId($_REQUEST['idCita']);
        if(CitaDAO::delete($cita)){
            $sms = "La cita se ha cancelado correctamente";
            $_SESSION['vista'] = VIEW.'verCitas.php';
        }else
            $errores['delete'] = "No se ha podido cancelar la cita";
    }
}
?>
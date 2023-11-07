<?php

    function enviado(){
        if(isset($_REQUEST['Enviar']))
            return true;
        return false;
    }

    function errores($errores,$name){
        if(isset($errores[$name]))
            echo $errores[$name];
    }

    function textoVacio($texto){
        if(empty($_REQUEST[$texto]))
            return true;
        return false;
    }

    function correoValido(){

        $correo = $_GET['correo'];
        $pos = strpos($correo,'@');
        if($pos !== false){
            return false;
        }
        return true;
    }

    function fechaLlegada(){

        $fechaLlegada = new DateTime($_GET['fechallegada']);
        $hoy = new DateTime("now");

        $intervalo = $fechaLlegada -> diff($hoy);

        if($intervalo->format('%R') == '+')
            return true;
        else{
            return false;
        }
    }

    function fechaSalida(){

        $fechaLlegada = new DateTime($_GET['fechallegada']);
        $fechaSalida = new DateTime($_GET['fechasalida']);

        $intervalo = $fechaLlegada -> diff($fechaSalida);

        if($intervalo->format('%R') == '+')
            return false;
        else{
            return true;
        }
    }

    function nHabitaciones(){

        $nHabitaciones = $_GET['numhabitaciones'];

        if ($nHabitaciones >= 1){
            return false;
        }else
            return true;
    }

    function tipoHabitacion(){

        $tipoHabitacion = $_GET['tipohabitacion'];

        if($tipoHabitacion == '0')
            return true;
        else
            return false;
    }
?>
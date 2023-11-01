<?php
    function enviado(){
        if(isset($_REQUEST['Enviar']))
            return true;
        else
            return false;
    }

    function textoVacio($name){
        if(empty($_REQUEST[$name]))
            return true;
        else
            return false;
    }

    function muestraErrores($errores,$name){
        if(isset($errores[$name]))
            echo $errores[$name];
    }

    function expresionNombre($name){
        $exp = '/^[a-zA-Z]{3,}/';
        $texto = $_REQUEST[$name];
        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function expresionApellido($name){
        $exp = '/^[a-zA-Z]{3,}\s[a-zA-Z]{3,}/';
        $texto = $_REQUEST[$name];
        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function expresionContrasena($name){
        $exp = '/[a-z]{1,}[A-Z]{1,}[0-9]{1,}/';
        $texto = $_REQUEST[$name];
        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function coincideContrasena($contr,$repcontr){
        $contrasena = $_REQUEST[$contr];
        $repContrasena = $_REQUEST[$repcontr];

        if($contrasena === $repContrasena)
            return false;
        else
            return true;
    }

    function expresionFecha($name){

        $exp = '/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/';
        $texto = $_REQUEST[$name];

        if(preg_match($exp,$texto))
            return false;
        else
            return true;

    }

    function esMayorEdad($name){
        
        $fechaUsuario = new DateTime($_REQUEST[$name]);
        $hoy = new DateTime();

        $intervalo = $fechaUsuario->diff($hoy);
        $intervaloFormateado = $intervalo->format('%y');
        if($intervaloFormateado >= 18)
            return false;
        else
            return true;

    }

    function expresionDNI($name){

        $exp = '/\d{8}[A-Z]$/';
        $texto = $_REQUEST[$name];

        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function expresionCorreo($name){

        $exp = '/[a-zA-Z0-9]{1,}@[a-zA-Z0-9]{1,}\.[a-zA-Z0-9]{1,}/';
        $texto = $_REQUEST[$name];

        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function expresionImagen($name){
        if(isset($_REQUEST[$name])){
            $exp = '/^[a-zA-Z0-9]+\.(jpg|png|bmp)$/';
            $texto = $_REQUEST[$name];

            if(preg_match($exp,$texto))
                return false;
            else
                return true;
        }else{
            return true;
        }
    }

?>
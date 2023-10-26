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

    function errores($errores,$name){
        if(isset($errores[$name]))
            echo $errores[$name];
    }

    function radioVacio($name){
        if(isset($_REQUEST[$name]))
            return false;
        return true; 
    }

    function distinta0(){
        if(isset($_REQUEST['selecciona']) && $_REQUEST['selecciona'] == '0')
            return true;
    }

    function muestraImagen($name){
    
        if(count($_FILES) != 0){
            $ruta = "/Tema3/PR8/";
            $ruta = $ruta . $_FILES[$name]['name'];
            if(move_uploaded_file($_FILES[$name]['tmp_name'],"/var/www/servidor1".$ruta)){
                echo "<Archivo subido<br>";
                echo "<img src='$ruta'>";
            }else
                echo "Error en la subida del archivo";
        }

    }

    function compruebaNumero($name){
        if($_REQUEST[$name] >= 0 && $_REQUEST[$name] <= 100)
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

    function compruebaCheck($name){

        if(isset($_REQUEST[$name])){
            $arrayCheck =  $_REQUEST[$name];
            $i = 0;

            foreach ($arrayCheck as $key) {
                $i++;
            }

            if($i >=1 && $i <= 3)
                return false;
            else
                return true;
        }

    }

    function recuerda($name){
        if(enviado() && !empty($_REQUEST[$name])){
            echo $_REQUEST[$name];
        }
        if(isset($_REQUEST['Borrar']))
            echo "''";
    }

    function recuerdaRadio($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value)
            echo 'checked';
        elseif(isset($_REQUEST['Borrar']))
            echo '';
    }

    function recuerdaSelect($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value)
            echo 'selected';
        elseif(isset($_REQUEST['Borrar']))
            echo '';
    }

    function recuerdaCheck($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && in_array($value,$_REQUEST[$name]))
            return 'checked';
        elseif(isset($_REQUEST['Borrar']))
            return '';
    }

?>
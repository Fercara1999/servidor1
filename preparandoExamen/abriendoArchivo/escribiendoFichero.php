<?php

    include("./funciones.php");

    $errores = [];
    $datos = [];

    if(compruebaVacios($errores,$datos)){
        if($fp = fopen("fichero.txt","a")){
             $cadena = implode (',',$datos);
             $cadena .= "\n";
            // foreach($dato as $datos){
                // $cadena .= $dato;
            // }
            if(fwrite($fp,$cadena)){
                echo "TODO OK";
                creaXML('fichero.txt');
            }else{
                echo "Error al escribir en fichero.txt";
            }

            fclose($fp);
        }else{
            echo "Error al abrir fichero.txt";
        }
    }

?>
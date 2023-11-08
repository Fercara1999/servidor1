<?php

    function pulsaVolver(){
        if(isset($_REQUEST['Volver']))
            return true;
        else
            return false;
    }

    function pulsaModificar(){
        if(isset($_REQUEST['Modificar']))
            return true;
        else
            return false;
    }

    function leeArchivo(){
        
        if(file_exists('fichero.txt')){
            if(!$fp = fopen('fichero.txt','r')){
                echo "Problemas al abrir el fichero";
            }else{
                $leido = fread($fp,filesize('fichero.txt'));
                fclose($fp);
                echo $leido;
            }
        }else{
            echo 'No existe el fichero seleccionado';
        }
    }

?>
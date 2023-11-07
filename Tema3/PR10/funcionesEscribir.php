<?php

    function pulsaVolver(){
        if(isset($_REQUEST['Volver']))
            return true;
        else
            return false;
    }

    function pulsaGuardar(){
        if(isset($_REQUEST['Guardar']))
            return true;
        else
            return false;
    }

    function escribirArchivo(){
        if(file_exists('fichero.txt')){
            if(!$fp = fopen('fichero.txt','a+')){
                echo "Problemas al abrir el fichero";
            }else{
                $texto = $_POST['contenido'];
                if(!fwrite($fp, $texto,strlen($texto))){
                // $escrito = fwrite($fp,$texto);
                // echo $escrito;
                fclose($fp);
                }
            }
        }else{
                echo 'No existe el fichero seleccionado';
            }
    }

    function leeArchivo(){
        if(file_exists('fichero.txt')){
            if(!$fp = fopen('fichero.txt','r')){
                echo "Problemas al abrir el fichero";
            }else{
                $leido = fread($fp,filesize('fichero.txt'));
                echo $leido;
                fclose($fp);
            }
        }else{
            echo 'No existe el fichero seleccionado';
        }
    }


?>
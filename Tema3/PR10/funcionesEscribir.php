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
        $fichero = $_GET['fichero'];
        echo $fichero;
        if(file_exists($fichero)){
            if(!$fp = fopen($fichero,'a+')){
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
        $fichero = $_GET['fichero'];
        if(file_exists($fichero)){
            if(!$fp = fopen($fichero,'r')){
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
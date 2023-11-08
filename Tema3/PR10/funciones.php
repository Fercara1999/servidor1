<?php

    function pulsaBoton($name){
        if(isset($_REQUEST[$name])){
            if($name == 'leer' || $name == 'escribir')
                header('Location: ./'.$name.'.php?fichero='.$_REQUEST['texto']);
            else
                header('Location: ./'.$name.'.php');
            return true;
        }else
            return false;
    }

    function leeArchivo(){

        if(isset($_REQUEST['fichero'])){
            $fichero = $_REQUEST['fichero'];
                if(file_exists($fichero)){
                    if(!$fp = fopen($fichero,'r')){
                        echo "Problemas al abrir el fichero";
                    }else{
                        $leido = fread($fp,filesize($fichero));
                        fclose($fp);
                        echo $leido;
                    }
                }else{
                    echo 'No existe el fichero seleccionado';
                }
        }
    }

    function escribirArchivo(){
        $fichero = $_REQUEST['fichero'];
        echo $fichero;
            if(!$fp = fopen($fichero,'a+')){
                echo "Problemas al abrir el fichero";
            }else{
                $texto = $_REQUEST['contenido'];
                if(fwrite($fp, $texto,strlen($texto))){
                fclose($fp);
                }
            }
        
    }

?>
<?php

    function pulsaBoton($name){
        
            if($name == 'leer' || $name == 'escribir'){
            $fichero = $_REQUEST['fichero'];
                if($name=='leer' && !file_exists($fichero)){
                    echo "No existe";
                    return false;
                }
                else{
                    header('Location: ./'.$name.'.php?fichero='.$_REQUEST['fichero']);
                    exit;
                }
                
            }else
                header('Location: ./'.$name.'.php');
            return true;
      
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
            if(!$fp = fopen($fichero,'w')){
                echo "Problemas al abrir el fichero";
            }else{
                $texto = $_REQUEST['contenido'];
                if(fwrite($fp, $texto,strlen($texto))){
                fclose($fp);
                }
            }
        
    }

    function muestraNotas(&$array){

        if(!$fp = fopen("notas.csv",'r')){
            echo "Problemas al abrir el fichero";
        }else{
            while (($lineas = fgetcsv($fp,1000,';')) !== false){
                array_push($array,$lineas);
            }
            fclose($fp);
        }
    }
    

?>
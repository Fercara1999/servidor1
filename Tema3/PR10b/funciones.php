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
        $i = 0;
        if(!$fp = fopen("notas.csv",'r')){
            echo "Problemas al abrir el fichero";
        }else{
            while (($lineas = fgetcsv($fp,1000,';')) !== false){
                $i++;
                array_push($array,$lineas);
            }
            fclose($fp);
        }
        return $i;
    }

    function pulsaEditar(){
        header("Location: ./modificar.php?alumno=" . $_REQUEST['dato1'] . "&nota1=" . $_REQUEST['dato2'] . "&nota2=" . $_REQUEST['dato3'] . "&nota3=" . $_REQUEST['dato4']);
    }

    function guardaDatos(){
        $fichero = "notas.csv";
        
        if(!$fp = fopen($fichero,'r+')){
            echo "Problemas al abrir el fichero";
        }else{
            $datos = array();
            $datos[0] = $_GET['alumno'];
            $datos[1] = $_GET['nota1'];
            $datos[2] = $_GET['nota2'];
            $datos[3] = $_GET['nota3'];

            while(($valores = fgetcsv($fp,1000,";")) !== false){
                $filas[] = $valores;
            }

            fseek($fp,0);

            foreach($filas as $fila){
                if($fila[0] == $datos[0])
                    fputcsv($fp,$datos,";");
                else{
                    fputcsv($fp,$fila,";");
                }
            }
           
            fclose($fp);
            header("Location: ./notas.php");
        }

    }

    function eliminaAlumno(){
        $fichero = "notas.csv";
        
        if(!$fp = fopen($fichero,'r+')){
            echo "Problemas al abrir el fichero";
        }else{
            $datos = array();
            $datos[0] = $_GET['alumno'];
            $datos[1] = $_GET['nota1'];
            $datos[2] = $_GET['nota2'];
            $datos[3] = $_GET['nota3'];

            while(($valores = fgetcsv($fp,1000,";")) !== false){
                $filas[] = $valores;
            }

            fseek($fp,0);

            foreach($filas as $fila){
                if($fila[0] != $datos[0]){
                    fputcsv($fp,$fila,";");
                }
            }
           
            ftruncate($fp,ftell($fp));
            fclose($fp);
        }
        
        // header("Location: ./notkas.php");
    }

    function anadeAlumno(){
        $fichero = "notas.csv";
        
        if(!$fp = fopen($fichero,'a')){
            echo "Problemas al abrir el fichero";
        }else{
            $datos = array();
            $datos[0] = $_GET['alumno'];
            $datos[1] = $_GET['nota1'];
            $datos[2] = $_GET['nota2'];
            $datos[3] = $_GET['nota3'];

            // while(($valores = fgetcsv($fp,1000,";")) !== false){
            //     $filas[] = $valores;
            // }

            fseek($fp,0);

            // foreach($filas as $fila){
                fputcsv($fp,$datos,";");
            // }
        }
           
            fclose($fp);
            header("Location: ./notas.php");
    }

?>
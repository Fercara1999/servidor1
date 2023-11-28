<?php

function editaFichero($fichero){

    if(file_exists($fichero)){

        if(fopen($fp = $_REQUEST['contenido'],'w')){
            $contenido = "";
            while($linea = fread($fp, filesize($fp))){
                $contenido .= $linea;
            }

            if(fwrite($fp,$contenido,4000)!= ''){
                echo "Escrito";
            }else{
                echo "Problemas al escribir el archivo";
            }

        }else{
            echo "Error al abrir el archivo";
        }
    }
}

?>
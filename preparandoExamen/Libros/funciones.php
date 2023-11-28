<?php

function meteLibro($archivo){
    if(!file_exists($archivo)){
        if($fp = fopen($archivo,"a+")){
            $titulo = $_GET['titulo'];
            $autor = $_GET['autor'];
            $editorial = $_GET['editorial'];
            $precio = $_GET['precio'];

            $linea = $titulo.",".$autor.",".$editorial.",".$precio;

            if(fwrite($fp,$linea)){
                echo "Escrito";
            }else{
                echo "No escribe";
            }
        }else{
            echo "No se abre el archivo";
        }

        fclose($fp);

    }else{
        
    }

}

?>
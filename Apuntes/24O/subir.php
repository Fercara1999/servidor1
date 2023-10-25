<?php

    if(count($_FILES) != 0){
        print_r($_FILES);
        echo "<br>";
        // $ruta = '/var/www/servidor1/Tema3/';
        foreach ($_FILES["fichero"]["tmp_name"] as $key => $nombre) {
            $ruta = "";
            $ruta = '/var/www/servidor1/Tema3/';
            $ruta .= basename($_FILES['fichero']['name'][$key]);
             if(move_uploaded_file($_FILES['fichero']['tmp_name'][$key],$ruta))
                echo "El archivo ".$_FILES['fichero']['name'][$key]." ha sido subido<br>";
             else
                echo "Error en la subida del archivo";
        }
             
    }
    
?>
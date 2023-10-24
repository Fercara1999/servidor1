<?php

    if(count($_FILES) != 0){
        print_r($_FILES);
        $ruta = '/var/www/servidor1/Tema3/';
        $ruta .= basename($_FILES['fichero']['name']);
    }
?>
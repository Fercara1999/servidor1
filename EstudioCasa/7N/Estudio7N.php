<?php

if(file_exists("fichero.txt")){
    if(!$fp = fopen("fichero.txt","r"))
        echo "error";
    else{
        $leido = fread($fp, filesize("fichero.txt"));
        echo $leido;
        fclose($fp);
    }
}else{
    echo "El fichero no existe";
}

if(file_exists("fichero.txt")){
    if(!$fp = fopen("fichero.txt","a+"))
        echo "Error";
    else{
        fwrite($fp,"Fernando",strlen("Fernando"));
        fclose($fp);
    }
}

?>
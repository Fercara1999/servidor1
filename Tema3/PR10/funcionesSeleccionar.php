<?php

    function pulsaLeer(){
        if(isset($_REQUEST['Leer']))
            return true;
        else
            return false;
    }

    function pulsaEscribir(){
        if(isset($_REQUEST['Escribir']))
            return true;
        else
            return false;
    }

?>
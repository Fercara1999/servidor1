<?php

function pulsadoBoton($boton){
    if(isset($_REQUEST[$boton]))
        return true;
    else
        return false;
}


?>
<?php

    // print_r($_REQUEST);

    echo "<br>";

    function enviado(){
        if(isset($_REQUEST['Enviar'])){
            $n1 = $_GET['n1'];
            $n2 = $_GET['n2'];
            $signo = $_GET['signo'];
            $resultado = opera($n1,$n2,$signo);
            echo $resultado;
            return true;
        }else
            return false;
    }

    function opera($n1,$n2,$signo){
        if($signo == '+')
            return $n1 + $n2;
        elseif($signo == '-')
            return $n1 - $n2;
        elseif($signo == '*')
            return $n1 * $n2;
        elseif($signo == '/')
            return $n1 / $n2;
        else
            return "No has seleccionado una opcion valida";
    }

?>
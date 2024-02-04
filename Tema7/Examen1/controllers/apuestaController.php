<?php

if(isset($_REQUEST['apostar'])){
    if(count($_REQUEST['numeros[]']) == 5){
        $apuesta = new Apuesta(
            null,
            $_SESSION['usuario']->codUsuario,
            $_REQUEST['numeros[0]'],
            $_REQUEST['numeros[1]'],
            $_REQUEST['numeros[2]'],
            $_REQUEST['numeros[3]'],
            $_REQUEST['numeros[4]'],
            null,
            1);
        ApuestaDAO::insert($apuesta);
        $_SESSION['vista'] = VIEW. "home.php";
    }else{
        echo "No has marcado 5 números";
    }
}else if(isset($_REQUEST['modificarApuesta'])){
    $_SESSION['vista'] = VIEW . 'editarApuesta.php';
}else if(isset($_REQUEST['guardarCambiosApuesta'])){
    if(count($_REQUEST['numeros']) == 5){
        $apuesta = new Apuesta(
            $_REQUEST['id_apuesta'],
            $_SESSION['usuario']->codUsuario,
            $_REQUEST['numeros'][0],
            $_REQUEST['numeros'][1],
            $_REQUEST['numeros'][2],
            $_REQUEST['numeros'][3],
            $_REQUEST['numeros'][4],
            null,
            1);
        ApuestaDAO::update($apuesta);
        $_SESSION['vista'] = VIEW. "home.php";
    }else{
        echo "No has marcado 5 números";
    }
}
?>
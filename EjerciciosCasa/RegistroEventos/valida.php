<?php

    function enviado(){
        if(isset($_REQUEST['Enviar']))
            return true;
        else
            return false;
    }

    $eventos = array();

    function anadeArray(&$namevarios){

        $nombre = $_REQUEST['nombre'];
        $fecha = $_REQUEST['fecha'];
        $lugar = $_REQUEST['lugar'];
        $descripcion = $_REQUEST['descripcion'];

        $nameuno = array(
            'nombre' => $nombre,
            'fecha' => $fecha,
            'lugar' => $lugar,
            'descripcion' => $descripcion
        );

        $namevarios[] = $nameuno;

    }

    function muestraArray($namevarios){
        foreach ($namevarios as $valor){
            echo "{$valor['nombre']} - {$valor['fecha']} - {$valor['lugar']} - {$valor['descripcion']}<br>";
        }
    }
?>
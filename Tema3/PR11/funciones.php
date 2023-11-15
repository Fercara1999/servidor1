<?php

function muestraNotas(&$array)
{
    $i = 0;
    if (!$fp = fopen("notas.csv", 'r')) {
        echo "Problemas al abrir el fichero";
    } else {
        while (($lineas = fgetcsv($fp, 1000, ';')) !== false) {
            $i++;
            array_push($array, $lineas);
        }
        fclose($fp);
    }
    
    return $i;
}

function guardaXML(){

    $dom = new DOMDocument("1.0","utf-8");
    $raiz = $dom->appendChild($dom->createElement("notas"));
    $alumno = $dom->createElement("alumno");
    if(!$fp = fopen("notas.csv","r") !== FALSE){
        while (($datos = fgetcsv($fp,1000,";")) !== false) {
            // $i++;
            $nombre =  $dom->createElement("nombre",$datos);
            $alumno -> appendChild($nombre);
        }
    }

    // $nombre =  $dom->createElement("nombre","");

    $dom -> formatOutput = true;
    $dom->save('notas.xml');
}

function guardaDatos()
{
    $fichero = "notas.csv";

    if (!$fp = fopen($fichero, 'r+')) {
        echo "Problemas al abrir el fichero";
    } else {
        $datos = array();
        $datos[0] = $_GET['alumno'];
        $datos[1] = $_GET['nota1'];
        $datos[2] = $_GET['nota2'];
        $datos[3] = $_GET['nota3'];

        while (($valores = fgetcsv($fp, 1000, ";")) !== false) {
            $filas[] = $valores;
        }

        fseek($fp, 0);

        foreach ($filas as $fila) {
            if ($fila[0] == $datos[0])
                fputcsv($fp, $datos, ";");
            else {
                fputcsv($fp, $fila, ";");
            }
        }

        fclose($fp);
        header("Location: ./notas.php");
    }
}

function eliminaAlumno()
{
    $fichero = "notas.csv";

    if (!$fp = fopen($fichero, 'r+')) {
        echo "Problemas al abrir el fichero";
    } else {
        $datos = array();
        $datos[0] = $_GET['alumno'];
        $datos[1] = $_GET['nota1'];
        $datos[2] = $_GET['nota2'];
        $datos[3] = $_GET['nota3'];

        while (($valores = fgetcsv($fp, 1000, ";")) !== false) {
            $filas[] = $valores;
        }

        fseek($fp, 0);

        foreach ($filas as $fila) {
            if ($fila[0] != $datos[0]) {
                fputcsv($fp, $fila, ";");
            }
        }

        ftruncate($fp, ftell($fp));
        fclose($fp);
    }

    header("Location: ./notas.php");
}

function anadeAlumno()
{
    $fichero = "notas.csv";
    
    if (!$fp = fopen($fichero, 'a')) {
        echo "Problemas al abrir el fichero";
    } else {
        $datos = array();
        $datos[0] = $_GET['alumno'];
        $datos[1] = $_GET['nota1'];
        $datos[2] = $_GET['nota2'];
        $datos[3] = $_GET['nota3'];

        fseek($fp, 0);

        fputcsv($fp, $datos, ";");
    }

    fclose($fp);
    header("Location: ./notas.php");
}

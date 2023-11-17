<?php

function guardaXML(){

    $dom = new DOMDocument("1.0","utf-8");
    $raiz = $dom->appendChild($dom->createElement("notas"));
    if($fp = fopen("notas.csv","r")){
        while (($datos = fgetcsv($fp,1000,";")) !== false) {
            $alumno = $dom->createElement("alumno");
            $nombre =  $dom->createElement("nombre",$datos[0]);
            $nota1 =  $dom->createElement("nota1",$datos[1]);
            $nota2 =  $dom->createElement("nota2",$datos[2]);
            $nota3 =  $dom->createElement("nota3",$datos[3]);
            $alumno -> appendChild($nombre);
            $alumno -> appendChild($nota1);
            $alumno -> appendChild($nota2);
            $alumno -> appendChild($nota3);
            $raiz -> appendChild($alumno);
        }
        fclose($fp);
        $dom -> formatOutput = true;
        $dom->save('notas3.xml');
        return true;
    }else{
        return false;
    }
}

function modificaXML(){
    
    $alumno = $_GET['alumno'];
    $nota1 = $_GET['nota1'];
    $nota2 = $_GET['nota2'];
    $nota3 = $_GET['nota3'];

    $dom = new DOMDocument();
    $dom -> load('notas.xml');

    $nombres = $dom->getElementsByTagName('nombre');
    $notas1 = $dom->getElementsByTagName('nota1');
    $notas2 = $dom->getElementsByTagName('nota2');
    $notas3 = $dom->getElementsByTagName('nota3');

    foreach ($nombres as $key => $value) {
        if($nombres[$key]->nodeValue == $alumno){
            $notas1[$key]->nodeValue = $nota1;
            $notas2[$key]->nodeValue = $nota2;
            $notas3[$key]->nodeValue = $nota3;
        }
    }

    $dom -> save('notas.xml');

}

function eliminaAlumnoXML(){

    $alumno = $_GET['dato1'];

    $dom = new DOMDocument();
    $dom -> load('notas.xml');
    $nombres = $dom->getElementsByTagName('nombre');

    foreach ($nombres as $nombre) {
        if($nombre->nodeValue == $alumno){
            $alumnoEliminar = $nombre ->parentNode;
            $alumnoEliminar -> parentNode -> removeChild($alumnoEliminar);
        }
    }

    $dom -> save("./notas.xml");

}

function anadeAlumnoXML(){

    $archivoxml = "./notas.xml";
    $xml =simplexml_load_file($archivoxml);

    $nuevoAlumno = $xml -> addChild("alumno");
    $nuevoAlumno -> addChild('nombre',$_GET['alumno']);
    $nuevoAlumno -> addChild('nota1', $_GET['nota1']);
    $nuevoAlumno -> addChild('nota2', $_GET['nota2']);
    $nuevoAlumno -> addChild('nota3', $_GET['nota3']);

    $xml->asXML('notas.xml');

}

?>
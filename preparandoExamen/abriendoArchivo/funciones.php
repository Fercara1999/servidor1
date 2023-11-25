<?php

function escribe(){

    $titulo = $_REQUEST['titulo'];
    $autor = $_REQUEST['autor'];
    $editorial  = $_REQUEST['editorial'];
    $isbn = $_REQUEST['isbn'];
    $precio = $_REQUEST['precio'];

}

function textoVacio(&$errores, $campo){
    if(empty($_REQUEST[$campo])){
        $errores[$campo] = 'El campo ' . $campo . " está vacío";
        return true;
    }else{
        return false;
    }
}

function compruebaVacios(&$errores,&$datos){
    if(textoVacio($errores,'titulo'))
        echo $errores['titulo'];
    else
        $datos['titulo'] = $_REQUEST['titulo'];
    if(textoVacio($errores,'autor'))
        echo $errores['autor'];
    else
        $datos['autor'] = $_REQUEST['autor'];
    if(textoVacio($errores,'editorial'))
        echo $errores['editorial'];
    else
        $datos['editorial'] = $_REQUEST['editorial'];
    if(textoVacio($errores,'isbn'))
        echo $errores['isbn'];
    else
        $datos['isbn'] = $_REQUEST['isbn'];
    if(textoVacio($errores,'precio'))
        echo $errores['precio'];
    else
        $datos['precio'] = $_REQUEST['precio'];
    if(count($errores) == 0 ){
        echo "Todo ok";
        return true;
    }else{
        echo count($errores);
        return false;
    }
}

function creaXML($fichero){{
    $XML = new DOMDocument('1.0','utf-8');

    
    $raiz = $XML -> appendChild($XML->createElement("Libros"));
    
    $campos = ["titulo","autor","editorial","isbn","precio"];
    
    if($fp = fopen($fichero,'r')){
        while (($linea = fgets($fp,4000)) !== false){
            $campoBase = $raiz -> appendChild($XML->createElement("libro"));
            $valores = explode(',', $linea);
            $i = 0;
            foreach ($campos as $valor) {
                $insertaNombreCampo = $campoBase->appendChild($XML->createElement($valor));
                $insertaNombreCampo->appendChild($XML->createTextNode($valores[$i]));
                $i++;
            }
            
        }
    }

    $XML->formatOutput = true;
    $XML -> save("./libros.xml");
}

}

?>
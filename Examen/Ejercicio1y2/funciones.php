<?php

// Función para comprobar que ha sido enviado el formulario
function enviado(){
    if(isset($_REQUEST['Registrar']))
        return true;
    else
        return false;
}

// Función para crear en el formulario los generos de forma dinámica
function creaGeneros(){
    $generos = ['accion', 'comedia', 'drama', 'terror', 'ciencia_ficcion', 'romance', 'animacion', 'documental', 'aventura'];

    foreach ($generos as $key => $value) {
        echo "<label for='gen[$key]'>".$value."<input ".recuerdaRadio('genero',$value)." type='radio' name='genero' id='gen[".$key."]' value='$value'></label>";        
    }
}

// Función para validad si el campo que se pasa como parámetro está o no vacío
function textoVacio($name){
    if(empty($_REQUEST[$name]))
        return true;
    else
        return false;
}


// Igual que la anterior función pero con el radio
function radioVacio($name){
    if(isset($_REQUEST[$name]))
        return false;
    return true; 
}

// Función que hace la comprobación de todas las funciones anteriores y
// de expresion comprobando si es o no cierta la condición
function validaFormulario(&$errores){
    if(textoVacio('id'))
        $errores['id'] = "El campo ID está vacio";
    elseif(expresionId())
        $errores['id'] = "El formato del ID no es el adecuado";
    if(textoVacio('titulo'))
        $errores['titulo'] = "El campo titulo está vacio";
    if(textoVacio('director'))
        $errores['director'] = "El campo director está vacio";
    if(textoVacio('anoLanzamiento'))
        $errores['anoLanzamiento'] = "El campo año de lanzamiento está vacio";
    elseif(expresionAno())
        $errores['anoLanzamiento'] = "El formato del año de lanzamiento es incorrecto";
    if(radioVacio('genero'))
        $errores['genero'] = "No has seleccionado un genero";
    if(textoVacio('duracion'))
        $errores['duracion'] = "El campo duracion está vacio";
    elseif(expresionDuracion())
    $errores['duracion'] = "El formato de la duracion es incorrecto";
    if(textoVacio('actores'))
        $errores['actores'] = "El campo actores está vacio";
    if(textoVacio('sinopsis'))
        $errores['sinopsis'] = "El campo sinopsis está vacio";
    elseif(expresionSinopsis())
        $errores['sinopsis'] = "El formato de la sinopsis es incorrecto";
    if(count($errores) == 0)
        return true;
    else
        return false;
}

// Función con la que comprobaremos y mostraremos en la página del formulario si existen errores en ese parametro
function errores(&$errores,$name){
    if(isset($errores[$name]))
        echo $errores[$name];
}

// Función que comprueba que el ID tiene el formato adecuado
function expresionId(){
    $patron = '/^[0-9]{4}[A-Z]{2}-[0-9]{3}$/';
    $campo = $_REQUEST['id'];

    if(preg_match($patron,$campo))
        return false;
    else
        return true;
}

// Función que comprueba que el año de lanzamiento tiene el formato adecuado
function expresionAno(){
    $patron = '/^[0-9]{4}$/';
    $campo = $_REQUEST['anoLanzamiento'];

    if(preg_match($patron,$campo))
        return false;
    else
        return true;
}

// Función que comprueba que la duracion tiene el formato adecuado
function expresionDuracion(){
    $patron = '/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/';
    $campo = $_REQUEST['duracion'];

    if(preg_match($patron,$campo))
        return false;
    else
        return true;
}

// Función que comprueba que el campo actores tiene el formato adecuado
function expresionActores(){
    $patron = '/^$/';
    $campo = $_REQUEST['actores'];

    if(preg_match($patron,$campo))
        return false;
    else
        return true;
}

// Función que comprueba que la sinopsis tiene el formato adecuado
function expresionSinopsis(){
    $patron = '/^[A-Za-z0-9]{50,}$/';
    $campo = $_REQUEST['sinopsis'];

    if(preg_match($patron,$campo))
        return false;
    else
        return true;
}

// Función que guarda los datos del formulario en un archivo de texto
function almacenaTexto(){
    $id = $_REQUEST['id'];
    $titulo = $_REQUEST['titulo'];
    $director = $_REQUEST['director'];
    $anoLanzamiento = $_REQUEST['anoLanzamiento'];
    $genero = $_REQUEST['genero'];
    $duracion = $_REQUEST['duracion'];
    $arrayActores = explode(',',$_REQUEST['actores']);
    $sinopsis = $_REQUEST['sinopsis'];

    $xml = new DOMDocument('1.0','utf-8');

    $xml -> formatOutput = true;

    $peliculas = $xml -> appendChild($xml -> createElement('peliculas'));

    $pelicula = $peliculas -> appendChild($xml -> createElement('pelicula'));

    $idx = $pelicula -> appendChild($xml -> createElement('id'));
    $idx -> nodeValue = $id;
    $titulox = $pelicula -> appendChild($xml -> createElement('titulo'));
    $titulox -> nodeValue = $titulo;
    $directorx = $pelicula -> appendChild($xml -> createElement('director'));
    $directorx -> nodeValue = $director;
    $anoLanzamientox = $pelicula -> appendChild($xml -> createElement('anoLanzamiento'));
    $anoLanzamientox -> nodeValue = $anoLanzamiento;
    $arrayActoresx = $pelicula -> appendChild($xml -> createElement('actores'));
    foreach ($arrayActores as $key => $value) {
        $actor = $arrayActoresx -> appendChild($xml -> createElement('actor',$value));
    }
    $sinopsisx = $pelicula -> appendChild($xml -> createElement('sinopsis'));
    $sinopsisx -> nodeValue = $sinopsis;

    $xml->save("./RegistroPeliculas.xml");

}

// Funcion para recordar el contenido de los campos de texto
function recuerda($name){
    if(enviado() && !empty($_REQUEST[$name])){
        echo $_REQUEST[$name];
    }else
        echo "";
}

// Funcion para recordar el campo radio marcado
function recuerdaRadio($name,$value){
    if(enviado() && isset($REQUEST[$name]) && $_REQUEST[$name] == $value)
        echo 'checked';
}

// Función para añadir una nueva película en caso de que ya exista el documento RegistraPeliculas.xml
function anadePeliculaXML(){

    $archivoxml = "RegistroPeliculas.xml";
    $xml =simplexml_load_file($archivoxml);

    $nuevaPelicula = $xml -> addChild("pelicula");
    $nuevaPelicula -> addChild('id',$_REQUEST['id']);
    $nuevaPelicula -> addChild('titulo', $_REQUEST['titulo']);
    $nuevaPelicula -> addChild('director', $_REQUEST['director']);
    $nuevaPelicula -> addChild('anoLanzamiento', $_REQUEST['anoLanzamiento']);
    $nuevaPelicula -> addChild('actores', $_REQUEST['actores']);
    $nuevaPelicula -> addChild('sinopsis', $_REQUEST['sinopsis']);

    $xml->asXML('RegistroPeliculas.xml');

}

function anadePeliculaXML2(){

    $xml = new DOMdocument();
    $xml-> load('RegistroPeliculas.xml');

    $xml -> formatOutput = true;

    $id = $_REQUEST['id'];
    $titulo = $_REQUEST['titulo'];
    $director = $_REQUEST['director'];
    $anoLanzamiento = $_REQUEST['anoLanzamiento'];
    $genero = $_REQUEST['genero'];
    $duracion = $_REQUEST['duracion'];
    $arrayActores = explode(',',$_REQUEST['actores']);
    $sinopsis = $_REQUEST['sinopsis'];

    $peliculas = $xml -> appendChild($xml -> createElement('peliculas'));

    $pelicula = $peliculas -> appendChild($xml -> createElement('pelicula'));

    $idx = $pelicula -> appendChild($xml -> createElement('id'));
    $idx -> nodeValue = $id;
    $titulox = $pelicula -> appendChild($xml -> createElement('titulo'));
    $titulox -> nodeValue = $titulo;
    $directorx = $pelicula -> appendChild($xml -> createElement('director'));
    $directorx -> nodeValue = $director;
    $anoLanzamientox = $pelicula -> appendChild($xml -> createElement('anoLanzamiento'));
    $anoLanzamientox -> nodeValue = $anoLanzamiento;
    $arrayActoresx = $pelicula -> appendChild($xml -> createElement('actores'));
    foreach ($arrayActores as $key => $value) {
        $actor = $arrayActoresx -> appendChild($xml -> createElement('actor',$value));
    }
    $sinopsisx = $pelicula -> appendChild($xml -> createElement('sinopsis'));
    $sinopsisx -> nodeValue = $sinopsis;

    $xml->save('RegistroPeliculas.xml');

}

// FUNCIONES EJERCICIO 2

// Función que lee el fichero XML
function leeXML(){
    $busqueda = $_REQUEST['busqueda'];
    $xml = new DOMDocument();
    $xml->load('RegistroPeliculas.xml');
    foreach ($xml->childNodes as $peliculas) {
        foreach($peliculas->childNodes as $pelicula){
            if($pelicula->nodeType == 1){
                $nodo = $pelicula->firstChild;
                do{
                    if($nodo->nodeType == 1){
                        if($nodo->nodeName == 'titulo'){
                            $patron = '/*'.$busqueda.'*$/';
                            $campo = $nodo->nodeValue;
                            // if(preg_match($patron,$campo)){
                                echo $nodo->nodeName . ":".$nodo->nodeValue;
                            // }
                        }
                    }
                }while($nodo = $nodo -> nextSibling);
            }
        }
    
    }
}

?>
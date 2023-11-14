<?php

function enviado(){
    if(isset($_REQUEST["Enviar"])){
        anadeLibro();
        return true;
    }else
        return false;
}

function anadeLibro(){
    if($fp = fopen("./libros.csv","a+")){

        $campos = [];
        $campos[0] = $_REQUEST['titulo'];
        $campos[1] = $_REQUEST['autor'];
        $campos[2] = $_REQUEST['editorial'];
        $campos[3] = $_REQUEST['fechaPub'];
        $campos[4] = $_REQUEST['precio'].'€';
        
        $ruta = "/EjerciciosCasa/formLibros/";
        $ruta = $ruta . $_FILES['portada']['name'];
        $campos[5] = $ruta;
        if(move_uploaded_file($_FILES['portada']['tmp_name'],"/var/www/servidor1".$ruta)){
        }

        fputcsv($fp,$campos,";");

       fclose($fp);

    }else{
        echo "Error al abrir el archivo";
    }
}

function verDatos(){

    if($fp = fopen("./libros.csv","a+")){
        echo "<table border='1'>";
        echo "<th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha de publicación</th><th>Precio</th><th>Portada</th>";
            while(($datos = fgetcsv($fp, 1000, ";")) !== false){
                echo "<tr>";
                for($i = 0 ; $i < count($datos)-1 ; $i++){
                    echo "<td>".$datos[$i]."</td>";
                }
                echo "<td><img src='$datos[5]' width='70px' height='100px'></td>";
                echo "</tr>";
            }
        echo "</table>";
        
    }
 
}

function muestraImagen($name){
    
    if(count($_FILES) != 0){
        $ruta = "/EjerciciosCasa/formLibros/";
        $ruta = $ruta . $_FILES[$name]['name'];
        if(move_uploaded_file($_FILES[$name]['tmp_name'],"/var/www/servidor1".$ruta)){
            echo "<Archivo subido<br>";
            echo "<img src='$ruta'>";
        }
    }else{

    }

}

function textoVacio($name){

    if(empty($_REQUEST[$name]))
        return true;
    else
        return false;
    
}

function validaFormulario(&$errores){

    if(textoVacio('titulo')){
        $errores['titulo'] = "El campo TITULO está vacio";
    }
    if(textoVacio('autor')){
        $errores['autor'] = "El campo AUTOR está vacio";
    }elseif(expresionAutor()){
        $errores['autor'] = "El formato del AUTOR no es correcto";
    }
    if(textoVacio('editorial')){
        $errores['editorial'] = "El campo EDITORIAL está vacio";
    }
    if(textoVacio('fechaPub')){
        $errores['fechaPub'] = "El campo FECHA DE PUBLICACION está vacio";
    }elseif(expresionFecha()){
        $errores['fechaPub'] = "El formato de la FECHA DE PUBLICACION no es correcto";
    }
    if(textoVacio('precio')){
        $errores['precio'] = "El campo PRECIO está vacio";
    }
}

function recuerda($name){
    if(isset($_REQUEST[$name]))
        echo $_REQUEST[$name];
    else
        echo "";
}

function muestraError($array,$campo){
    if(isset($array[$campo]))
        echo $array[$campo];
}

function expresionFecha(){

    $patron = '/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/';
    $fecha = $_REQUEST['fechaPub'];

    if(!(preg_match($patron,$fecha)))
        return true;
    else
        return false;
}

function expresionAutor(){

    $patron = '/^[a-zA-Z]{3,}\s[a-zA-Z]{3,}/';
    $autor = $_REQUEST['autor'];
    if(!(preg_match($patron,$autor)))
        return true;
    else
        return false;
}

?>
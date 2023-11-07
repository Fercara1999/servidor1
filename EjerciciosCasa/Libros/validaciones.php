<?php

    function enviado(){
        if(isset($_REQUEST["Enviar"]))
            return true;
        else
            return false;
    }

    function textoVacio($name){
        if(empty($_REQUEST[$name]))
            return false;
        else
            return true;
    }

    function errores($errores,$name){
        if(!empty($errores[$name]))
            echo $errores[$name];
    }

    function expresionISBN($name){

        $ISBN = $_REQUEST[$name];

        $exp = '/^978-84-\d{4}\-\d{3}\-\d{1}$/';
        if(!preg_match($exp, $ISBN))
            return true;
        else
            return false;

    }

    function expresionAno($name){

        $ano = $_REQUEST[$name];

        $exp = '/\d{4}/';

        if(preg_match($exp, $ano))
            return false;
        else
            return true;
    }

    function compruebaAno($name){

        $ano = $_REQUEST[$name];

        $hoy = new DateTime();

        $anoHoy =  date_format($hoy,'Y');

        if($ano > $anoHoy)
            return true;
        else
            return false;
    }

    function compruebaGenero($name){

        $genero = $_REQUEST[$name];

        if($genero == 0)
            return true;
        else
            return false;
    }

    function validaFormulario(&$errores){
        if(!textoVacio('titulo'))
                $errores['titulo'] = 'El campo titulo está vacio';
            if(!textoVacio('autor'))
                $errores['autor'] = 'El campo autor está vacio';
            if(!textoVacio('isbn'))
                $errores['isbn'] = 'El campo isbn está vacio';
            if(expresionISBN('isbn'))
                $errores['isbn'] = 'El formato del ISBN es incorrecto';
            if(!textoVacio('ano'))
                $errores['ano'] = 'El campo año está vacio';
            if(expresionAno('ano'))
                $errores['ano'] = 'El formato del año es incorrecto';
            if(compruebaAno('ano'))
                $errores['ano'] = "El año introducido es mayor que el actual";
            if(compruebaGenero('genero'))
                $errores['genero'] = "No has seleccionado un genero";
            if(!textoVacio('sinopsis'))
                $errores['sinopsis'] = 'El campo sinopsis está vacio';
            if(!textoVacio('editorial'))
                $errores['editorial'] = 'El campo editorial está vacio';
            if(expresionImagen('imagen'))
                $errores['imagen'] = 'La imagen no está en el formato correcto';
            if(count($errores) == 0)
                return true;
            else
                return false;
    }

    function muestraFormulario(){
        if(enviado()){
            $titulo = $_REQUEST['titulo'];
            $autor = $_REQUEST['autor'];
            $isbn = $_REQUEST['isbn'];
            $genero = $_REQUEST['genero'];
            $ano = $_REQUEST['ano'];
            $sinopsis = $_REQUEST['sinopsis'];
            $editorial = $_REQUEST['editorial'];
            
            echo "El titulo del libro es " .$titulo ."<br>";
            echo "El autor del libro es " .$autor."<br>";
            echo "El isbn del libro es " .$isbn."<br>";
            echo "El genero del libro es " .$genero."<br>";
            echo "El ano de publicacion del libro es " .$ano."<br>";
            echo "La sinopsis del libro es " .$sinopsis."<br>";
            echo "La editorial del libro es " .$editorial."<br>";

            muestraImagen('imagen');
            
        }

    }

    function expresionImagen($name){
        if(enviado()){
            $exp = '/^[a-zA-Z0-9]+\.(jpg|png|gif)$/';
            $img = $_FILES[$name]['name'];

            if(preg_match($exp,$img))
                return false;
            else
                return true;
        }
    }

    function muestraImagen($name){

        if(count($_FILES) != 0){
            $ruta = "/EjerciciosCasa/Libros/";
            $ruta = $ruta . $_FILES[$name]['name'];
            if(move_uploaded_file($_FILES[$name]['tmp_name'],"/var/www/servidor1".$ruta)){
                echo "<Archivo subido<br>";
                echo "<img src='$ruta'>";
            }
        }else{

        }
    }

?>
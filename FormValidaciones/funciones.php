<?php

function enviado(){
    if(isset($_REQUEST["Enviar"]))
        return true;
    else
        return false;
}

function textoVacio($campo){
    if(empty($_REQUEST[$campo]))
        return true;
    else
        return false;
}

function muestraErrores(&$errores,$campo){
    if(isset($errores[$campo]))
        echo $errores[$campo];
}

function recuerdaTexto($campo){
    if(isset($_REQUEST[$campo]))
        echo $_REQUEST[$campo];
    else
        echo "";
}

function expresionAutor(){
    $patron = '/^[A-Z]{1}[a-z]{2,15}\s[A-Z]{1}[a-z]{2,15}$/';
    $campo = $_REQUEST['autor'];

    if(preg_match($patron,$campo))
        return false;
    else
        return true;
}

function expresionFecha(){

    $patron = '/^\d{2}\/\d{2}\/\d{4}$/';
    $campo = $_REQUEST['fechaPublicacion'];

    if(preg_match($patron,$campo))
        return false;
    else
        return true;
}

function validaFormulario(&$errores){
        if(textoVacio('titulo'))
            $errores['titulo'] = "El campo titulo está vacio";
        if(textoVacio('autor'))
            $errores['autor'] = "El campo autor está vacio";
        elseif(expresionAutor())
            $errores['autor'] = "El nombre del autor no está escrito correctamente";
        if(textoVacio('editorial'))
            $errores['editorial'] = "El campo editorial está vacio";
        if(textoVacio("fechaPublicacion"))
            $errores['fechaPublicacion'] = "La fecha de publicacion está vacía";
        elseif(expresionFecha())
            $errores['fechaPublicacion'] = "La fecha no está en el formato correcto";
        if(textoVacio("precio"))
            $errores['precio'] = "El campo precio está vacio";
        if(count($errores) == 0)
            return true;
        else
            return false;

}

function creaFichero(){

    if($fp = fopen('./libros.csv','a')){
        $datos = [$_REQUEST['titulo'],$_REQUEST['autor'],$_REQUEST['editorial'],$_REQUEST['fechaPublicacion'],$_REQUEST['precio']];
            fputcsv($fp,$datos,';');

        fclose($fp);

        // muestraTabla();
    }else
        echo "Error al obtener el fichero";
}

function muestraTabla(){

    if($fp = fopen('./libros.csv','r')){
        echo "<table border='1'>";
        echo "<th>Titulo</th><th>Autor</th><th>Editorial</th><th>Fecha publicacion</th><th>Precio</th>";
        while($fila = fgetcsv($fp,filesize('libros.csv'),';')){
            echo "<tr>";
            $campos = ['titulo','autor','editorial','fechaPublicacion','precio'];
            $datos = count($fila);
            echo "<form method='get'>";
            for($i = 0; $i < $datos; $i++){
                echo "<label for ='$campos[$i]'><td><input type='text' name='".$campos[$i]."' id='".$campos[$i]."'>".$fila[$i]."</td></label>";
            }
            echo "<td><input type='submit' name='Editar' value='Editar' id='Editar></td>";
            echo "<td><input type='submit' name='Eliminar' value='Eliminar' id='Eliminar></td>";
            echo "</form>";
            echo "</tr>";
        }
    }else
        echo "Error al leer el fichero";

    fclose($fp);
}

?>
<?php
    // FUNCIONES GENERALES

    // Comprueba si he ha pulsado o no un botón
    function pulsadoBoton($boton){
        if(isset($_REQUEST[$boton]))
            return true;
        else
            return false;
    }

    // Comprueba si la sesión está o no iniciada
    function sesionIniciada(){
        if(!isset($_SESSION['usuario']['usuario'])){
            $_SESSION['error'] = "No tiene la sesión iniciada";
            return false;
        }else
            return true;
    }

    // Recuerda el valor de un campo si no se ha podido llevar a cabo la ejecución del formulario
    function recuerda($campo){
        if(!empty($_REQUEST[$campo])){
            echo $_REQUEST[$campo];
        }
    }

    // Muestra el mensaje de error teniendo en cuenta el array de errores que le pasamos y el campo del array
    function muestraError(&$array,$campo){
        if(isset($array[$campo]))
            echo $array[$campo];
    }

    function muestraCookies() {
        if (!empty($_COOKIE['isbn'])) {
            $cookies = array_reverse($_COOKIE['isbn'], true);
            foreach ($cookies as $key => $value) {
                $producto = findById($value);
                if ($producto) {
                    echo "<p class='text-center'>- <a href='carrito.php?isbn=" . $producto['ISBN'] . "'>" . $producto['titulo'] . "</a></p>";
                }
            }
        } else {
            echo "No se ha visitado ningún producto ";
        }
    }

?>
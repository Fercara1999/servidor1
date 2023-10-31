<?php

    function enviado(){
        if(isset($_REQUEST['Enviar']))
            return true;
        else
            return false;
    }

    function textoVacio($name){

        if(empty($_REQUEST[$name]))
            return true;
        else
            return false;
    }

    function errores($errores,$name){
        if(isset($errores[$name]))
            echo $errores[$name];
    }

    function radioVacio($name){
        if(isset($_REQUEST[$name]))
            return false;
        return true; 
    }

    function distinta0(){
        if(isset($_REQUEST['selecciona']) && $_REQUEST['selecciona'] == '0')
            return true;
    }

    function muestraImagen($name){
    
        if(count($_FILES) != 0){
            $ruta = "/Tema3/PR8/";
            $ruta = $ruta . $_FILES[$name]['name'];
            if(move_uploaded_file($_FILES[$name]['tmp_name'],"/var/www/servidor1".$ruta)){
                echo "<Archivo subido<br>";
                echo "<img src='$ruta'>";
            }
                // echo "Error en la subida del archivo";
        }else{

        }

    }

    function compruebaNumero($name){
        if($_REQUEST[$name] >= 0 && $_REQUEST[$name] <= 100)
            return false;
        else
            return true;
    }

    function esMayorEdad($name){
        
        $fechaUsuario = new DateTime($_REQUEST[$name]);
        $hoy = new DateTime();

        $intervalo = $fechaUsuario->diff($hoy);
        $intervaloFormateado = $intervalo->format('%y');
        if($intervaloFormateado >= 18)
            return false;
        else
            return true;

    }

    function compruebaCheck($name){

        if(isset($_REQUEST[$name])){
            $arrayCheck =  $_REQUEST[$name];
            $i = 0;

            foreach ($arrayCheck as $key) {
                $i++;
            }

            if($i >=1 && $i <= 3)
                return false;
            else
                return true;
        }

    }

    function recuerda($name){
        if(enviado() && !empty($_REQUEST[$name])){
            echo $_REQUEST[$name];
        }
        if(isset($_REQUEST['Borrar']))
            echo "''";
    }

    function recuerdaRadio($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value)
            echo 'checked';
        elseif(isset($_REQUEST['Borrar']))
            echo '';
    }

    function recuerdaSelect($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value)
            echo 'selected';
        elseif(isset($_REQUEST['Borrar']))
            echo '';
    }

    function recuerdaCheck($name,$value){
        if(enviado() && isset($_REQUEST[$name]) && in_array($value,$_REQUEST[$name]))
            return 'checked';
        elseif(isset($_REQUEST['Borrar']))
            return '';
    }

    function validaFormulario(&$errores){
            if(textoVacio('alfabetico'))
                $errores['alfabetico'] = 'Alfabetico vacio';
            if(textoVacio('opalfabetico'))
                $errores['opalfabetico'] = 'Opcional Alfabetico vacio';
            if(textoVacio('alfanumerico'))
                $errores['alfanumerico'] = 'Alfanumericio vacio';
            if(textoVacio('opalfanumerico'))
                $errores['opalfanumerico'] = 'Opcional Alfanumericio vacio';
            if(textoVacio('numerico'))
                $errores['numerico'] = 'Numerico vacio';
            if(compruebaNumero('numerico'))
                $errores['numerico'] = "Debes introducir un numero entre 0 y 100";
            if(textoVacio('opnumerico'))
                $errores['opnumerico'] = 'Opcional numerico vacio';
            if(textoVacio('fecha'))
                $errores['fecha'] = 'Fecha vacio';
            if(esMayorEdad('fecha'))
                $errores['fecha'] = "La fecha introducida es menor a los 18 años";
            if(textoVacio('opfecha'))
                $errores['opfecha'] = 'Opcional Fecha vacio';
            if(radioVacio('opcion'))
                $errores['opcion'] = 'No has seleccionado ninguna opcion radio';
            if(distinta0())
                $errores['selecciona'] = 'No has elegido ninguna opcion del select';
            if(radioVacio('check'))
                $errores['check'] = 'No has elegido ninguna opcion del check';
            if(compruebaCheck('check'))
                $errores['check'] = "Tienes que marcar 1 opcion como mínimo y 3 como máximo";
            if(textoVacio('tlf'))
                $errores['tlf'] = 'No has introducido un numero de telefono';
            if(textoVacio('correo'))
                $errores['correo'] = 'No has introducido un correo electrónico';
            if(textoVacio('contrasena'))
                $errores['contrasena'] = 'No has introducido una contraseña';
            // if(isset($_FILES['archivo']))
            //     $errores['archivo'] = 'No has subido ningún archivo';
            if(count($errores) == 0){
                return true;
            }else{
                return false;
            }
    }

    function muestraFormulario(){
        if(!(textoVacio('alfabetico')))
            echo "El valor del campo alfabetico es: " . $_REQUEST['alfabetico'];

        if(!(textoVacio('opalfabetico')))
            echo "<br>El valor del campo alfabetico opcional es: " . $_REQUEST['opalfabetico'];

        if(!(textoVacio('alfanumerico')))
            echo "<br>El valor del campo alfanumérico es: " . $_REQUEST['alfanumerico'];

        if(!(textoVacio('opalfanumerico')))
            echo "<br>El valor del campo opcional alfanumérico es: " . $_REQUEST['opalfanumerico'];
        
        if(!(textoVacio('numerico')))
            echo "<br>El valor del campo numerico es: " . $_REQUEST['numerico'];

        if(!(textoVacio('opnumerico')))
            echo "<br>El valor del campo opcional numerico es: " . $_REQUEST['opnumerico'];

        if(!(textoVacio('fecha')))
            echo "<br>El valor del fecha numerico es: " . $_REQUEST['fecha'];

        if(!(textoVacio('opfecha')))
            echo "<br>El valor del campo opcional fecha es: " . $_REQUEST['opfecha'];

        if(!(radioVacio('opcion')))
            echo "<br>El valor seleccionado en el campo radio es: " . $_REQUEST['opcion'];

        if(!(distinta0()))
            echo "<br>El valor seleccionado en el campo select es: " . $_REQUEST['selecciona'];
        
        if(!(radioVacio('check'))){
            $arrayCheck = $_REQUEST['check'];
            echo "<br>Los valores marcados en el check han sido: ";
            foreach ($arrayCheck as $key){
                echo "$key, ";
            }  
        }

        if(!(textoVacio('tlf')))
            echo "<br>El telefono introducido es: " . $_REQUEST['tlf'];

        if(!(textoVacio('correo')))
            echo "<br>El correo introducido es: " . $_REQUEST['correo'];

        if(!(textoVacio('contrasena')))
            echo "<br>La contraseña introducida es: " . $_REQUEST['contrasena']."<br>";

        muestraImagen('archivo');
    }

    function compruebaAction(){
        if(validaFormulario($errores))
            return "./procesa.php";
        else
            return ;
    }

    

?>
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

    function muestraErrores($errores,$name){
        if(isset($errores[$name]))
            echo $errores[$name];
    }

    function expresionNombre($name){
        $exp = '/^[a-zA-Z]{3,}/';
        $texto = $_REQUEST[$name];
        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function expresionApellido($name){
        $exp = '/^[a-zA-Z]{3,}\s[a-zA-Z]{3,}/';
        $texto = $_REQUEST[$name];
        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function expresionContrasena($name){
        $exp = '/^(?=.*[a-z]){1,}(?=.*[A-Z]){1,}(?=.*[0-9]){1,}/';
        $texto = $_REQUEST[$name];
        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function coincideContrasena($contr,$repcontr){
        $contrasena = $_REQUEST[$contr];
        $repContrasena = $_REQUEST[$repcontr];

        if($contrasena === $repContrasena)
            return false;
        else
            return true;
    }

    function expresionFecha($name){

        $exp = '/(\d{4})(\/)(\d{1,2})(\/)(\d{1,2})/';
        $texto = $_REQUEST[$name];

        if(preg_match($exp,$texto))
            return false;
        else
            return true;

    }

    function esMayorEdad($name){
        
        $fechaUsuario = date_create_from_format('Y/m/d',$_REQUEST[$name]);
        $hoy = new DateTime();

        $intervalo = $fechaUsuario->diff($hoy);
        $intervaloFormateado = $intervalo->format('%y');
        if($intervaloFormateado >= 18)
            return false;
        else
            return true;

    }

    function expresionDNI($name){

        $exp = '/\d{8}[A-Z]$/';
        $texto = $_REQUEST[$name];

        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function letraDNI($name){
        $DNI = $_REQUEST[$name];
        $numeros = substr($DNI,0,-1);
        $letra = substr($DNI,strlen($DNI)-1);
        $arrayLetras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
        $posicionMiLetra = $numeros % count($arrayLetras);
        $miLetra = $arrayLetras[$posicionMiLetra];
        if ($miLetra == $letra)
            return false;
        else
            return true;
    }

    function expresionCorreo($name){

        $exp = '/[a-zA-Z0-9]{1,}@[a-zA-Z0-9]{1,}\.[a-zA-Z0-9]{1,}/';
        $texto = $_REQUEST[$name];

        if(preg_match($exp,$texto))
            return false;
        else
            return true;
    }

    function expresionImagen($name){
        if(isset($_FILES[$name]['name'])){
            $exp = '/^[a-zA-Z0-9]+\.(jpg|png|bmp)$/';
            $texto = $_FILES[$name]['name'];

            if(preg_match($exp,$texto))
                return false;
            else
                return true;
        }else{
            return true;
        }
    }

    function imagenVacia($name){
        if(empty($_FILES[$name]['name']))
            return true;
        else
            return false;
    }

    function muestraImagen($name){
    
        if(count($_FILES) != 0){
            $ruta = "/Tema3/PR9/";
            $ruta = $ruta . $_FILES[$name]['name'];
            if(move_uploaded_file($_FILES[$name]['tmp_name'],"/var/www/servidor1".$ruta)){
                echo "<Archivo subido<br>";
                echo "<img src='$ruta'>";
            }
        }else{

        }

    }

    function compruebaFormulario(&$errores){

        if(textoVacio('nombre'))
            $errores['nombre'] = "El campo nombre está vacío";
        elseif(expresionNombre('nombre'))
            $errores['nombre'] = "El contenido introducido en el nombre no es valido";
        if(textoVacio('apellido'))
            $errores['apellido'] = "El campo apellido está vacío";
        elseif(expresionApellido('apellido'))
            $errores['apellido'] = "El contenido introducido en los apellidos no es valido";
        if(textoVacio('contrasena'))
            $errores['contrasena'] = "El campo contrasena está vacío";
        elseif(expresionContrasena('contrasena'))
            $errores['contrasena'] = "El contenido introducido en la contraseña no es valido";
        if(textoVacio('repcontrasena'))
            $errores['repcontrasena'] = "El campo confirma contrasena está vacío";
        if(expresionContrasena('repcontrasena'))
            $errores['repcontrasena'] = "El contenido introducido en la confirmación de contraseña no es valido";
        if(coincideContrasena('contrasena','repcontrasena'))
            $errores['repcontrasena'] = "Las contraseñas no coinciden";
        if(textoVacio('fecha'))
            $errores['fecha'] = "El campo fecha está vacío";
        elseif(expresionFecha('fecha'))
            $errores['fecha'] = "El formato de fecha no es correcto";
        elseif(esMayorEdad('fecha'))
            $errores['fecha'] = "La fecha es inferior a 18 años";
        if(textoVacio('DNI'))
            $errores['DNI'] = "El campo DNI está vacío";
        elseif(expresionDNI('DNI'))
            $errores['DNI'] = "El formato de DNI es incorrecto";
        elseif(letraDNI('DNI'))
            $errores['DNI'] = "El DNI no está escrito correctamente";
        if(textoVacio('email'))
            $errores['email'] = "El campo email está vacío";
        elseif(expresionCorreo('email'))
            $errores['email'] = "El formato del correo es incorrecto";
        if(imagenVacia('imagen'))
            $errores['imagen'] = "El campo imagen está vacío";    
        elseif(expresionImagen('imagen'))
            $errores['imagen'] = "El formato de la imagen no es correcto o el campo está vacío";
        if(count($errores) == 0)
            return true;
        else
            return false;
    }

    function muestraFormulario(){
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $contrasena = $_REQUEST['contrasena'];
        $fecha = $_REQUEST['fecha'];
        $dni = $_REQUEST['DNI'];
        $email = $_REQUEST['email'];
        
        echo "El contenido del campo nombre es: " . $nombre;
        echo "<br>El contenido del campo apellido es: " . $apellido;
        echo "<br>El contenido de los campos de contraseña es: " .$contrasena;
        echo "<br>El contenido del campo fecha es: " .$fecha;
        echo "<br>El contenido del campo DNI es: " .$dni;
        echo "<br>El contenido del campo correo es: " .$email."<br>";
        muestraImagen('imagen');
        
    }

    function recuerda($name){
        if(enviado() && !empty($_POST[$name])){
            echo $_POST[$name];
        }
        if(isset($_POST['Borrar']))
            echo "''";
    }

?>
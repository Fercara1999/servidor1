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
        $exp = '/[a-z]{1,}[A-Z]{1,}[0-9]{1,}/';
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

        $exp = '/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/';
        $texto = $_REQUEST[$name];

        if(preg_match($exp,$texto))
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

    function expresionDNI($name){

        $exp = '/\d{8}[A-Z]$/';
        $texto = $_REQUEST[$name];

        if(preg_match($exp,$texto))
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
        if(expresionNombre('nombre'))
            $errores['nombre'] = "El contenido introducido en el nombre no es valido";
        if(textoVacio('apellido'))
            $errores['apellido'] = "El campo apellido está vacío";
        if(expresionApellido('apellido'))
            $errores['apellido'] = "El contenido introducido en los apellidos no es valido";
        if(expresionContrasena('contrasena'))
            $errores['contrasena'] = "El contenido introducido en la contraseña no es valido";
        if(expresionContrasena('repcontrasena'))
            $errores['repcontrasena'] = "El contenido introducido en la confirmación de contraseña no es valido";
        if(coincideContrasena('contrasena','repcontrasena'))
            $errores['repcontrasena'] = "Las contraseñas no coinciden";
        if(esMayorEdad('fecha'))
            $errores['fecha'] = "La fecha es inferior a 18 años";
        if(expresionDNI('DNI'))
            $errores['DNI'] = "El formato de DNI es incorrecto";
        if(expresionCorreo('email'))
            $errores['email'] = "El formato del correo es incorrecto";
        // if(textoVacio('imagen'))
        //     $errores['imagen'] = "El campo imagen está vacio";
        if(expresionImagen('imagen'))
            $errores['imagen'] = "El formato de la imagen no es correcto";
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
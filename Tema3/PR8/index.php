<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR8</title>
    <link rel="stylesheet" href="../../css/estilos.css" type="text/css">
    <link rel="stylesheet" href="./estilos.css" type="text/css">
</head>
<body>
    <?php
        include("../../fragmentos/header.html");
        include("./validaciones.php");
    ?>

    <?php
        $errores = array();
        
        if(enviado()){
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
                $errores['check'] = "Tienes que marcar una opcion como mínimo y 3 como máximo";
            if(textoVacio('tlf'))
                $errores['tlf'] = 'No has introducido un numero de telefono';
            if(textoVacio('correo'))
                $errores['correo'] = 'No has introducido un correo electrónico';
            if(textoVacio('contrasena'))
                $errores['contrasena'] = 'No has introducido una contraseña';
            if(textoVacio('archivo'))
                $errores['archivo'] = 'No has subido ningún archivo';
        }
            
    ?>
    
    <form action="" method="get" name="formulario1" enctype="multipart/form-data">
        <h2>Formulario de registro</h2>
        <label for="alfabetico">Alfabetico <input type="text" name="alfabetico" id="alfabetico" value="<?php recuerda('alfabetico'); ?>" ></label><span style= "color:red"><?php errores($errores,'alfabetico'); ?></span>
        <br><label for="opalfabetico">Alfabetico opcional <input type="text" name="opalfabetico" id="opalfabetico" value=""></label><span style= "color:red"><?php errores($errores,'opalfabetico'); ?></span>
        <br><label for="alfanumerico">Alfanumerico <input type="text" name="alfanumerico" id="alfanumerico" value="" ></label><span style= "color:red"><?php errores($errores,'alfanumerico'); ?></span>
        <br><label for="opalfanumerico">Alfanumerico opcional <input type="text" name="opalfanumerico" id="opalfanumerico" value=""></label><span style= "color:red"><?php errores($errores,'opalfanumerico'); ?></span>
        <br><label for="numerico">Numerico <input type="number" name="numerico" id="numerico" value="" ></label><span style= "color:red"><?php errores($errores,'numerico'); ?></span>
        <br><label for="opnumerico">Numerico opcional <input type="number" name="opnumerico" id="opnumerico" value=""></label><span style= "color:red"><?php errores($errores,'opnumerico'); ?></span>
        <br><label for="fecha">Fecha <input type="date" name="fecha" id="fecha" value="dd/mm/aaaa" ></label><span style= "color:red"><?php errores($errores,'fecha'); ?></span>
        <br><label for="opfecha">Fecha opcional <input type="date" name="opfecha" id="opfecha"></label><span style= "color:red"><?php errores($errores,'opfecha'); ?></span>
        <br>Radio obligatorio
        <br><label for="op1">Opcion1 <input type="radio" name="opcion[]" id="op1"></label>
        <label for="op2">Opcion2 <input type="radio" name="opcion[]" id="op2"></label>
        <label for="op3">Opcion3 <input type="radio" name="opcion[]" id="op3"></label>
        <span style= "color:red"><?php errores($errores,'opcion'); ?></span>
        <br>Select <select name="selecciona" id="selecciona">
            <option value="0">select1</option>
            <option value="select2">select2</option>
            <option value="select3">select3</option>
            <option value="select4">select4</option>
            <option value="select5">select5</option>
            <option value="select6">select6</option>
        </select>
        <span style= "color:red"><?php errores($errores,'selecciona'); ?></span><br>
        Check<br>
        <?php
            for( $i = 1; $i <= 6; $i++ )
            echo "<label for='check.$i'><input type='checkbox' name='check[]' id='check.$i' value='check.$i'>Check$i</input></label><br>"
        ?>
        <span style= "color:red"><?php errores($errores,'check'); ?></span>
        <br><label for="tlf">Nº Telefono <input type="tel" name="tlf" id="tlf"></label>
        <span style= "color:red"><?php errores($errores,'tlf'); ?></span>
        <br><label for="correo">Correo electrónico <input type="email" name="correo" id="correo" ></label>
        <span style= "color:red"><?php errores($errores,'correo'); ?></span>
        <br><label for="contrasena">Contraseña <input type="password" name="contrasena" id="contrasena" ></label>
        <span style= "color:red"><?php errores($errores,'contrasena'); ?></span>
        <br><label for="archivo">Subir documento <input type="file" name="archivo" id="archivo"></label>
        <?php muestraImagen('archivo'); ?>
        <span style= "color:red"><?php errores($errores,'contrasena'); ?></span>
        <br><input type="submit" name="Enviar" id="Enviar">
    </form>

    <?php
        include("../../fragmentos/footer.php");
    ?>

</body>

</html>
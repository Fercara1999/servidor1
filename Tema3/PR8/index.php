<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR8</title>
</head>
<body>
    <?php
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
            if(textoVacio('opnumerico'))
                $errores['opnumerico'] = 'Opcional numerico vacio';
            if(textoVacio('fecha'))
                $errores['fecha'] = 'Fecha vacio';
            if(textoVacio('opfecha'))
                $errores['opfecha'] = 'Opcional Fecha vacio';
            if(radioVacio('opcion'))
                $errores['opcion'] = 'No has seleccionado ninguna opcion radio';
            if(distinta0())
                $errores['selecciona'] = 'No has elegido ninguna opcion del select';
            if(radioVacio('check'))
                $errores['check'] = 'No has elegido ninguna opcion del check';
            if(textoVacio('tlf'))
                $errores['tlf'] = 'No has introducido un numero de telefono';
        }
            
    ?>
    
    <form action="" method="get" name="formulario1" enctype="multipart/form-data">
        <h2>Formulario de registro</h2><br>
        <label for="alfabetico">Alfabetico <input type="text" name="alfabetico" id="alfabetico" value="Nombre" ></label><br>
        <p><?php errores($errores,'alfabetico'); ?></p>
        <label for="opalfabetico">Alfabetico Opcional <input type="text" name="opalfabetico" id="opalfabetico" value=""></label><br>
        <p><?php errores($errores,'opalfabetico'); ?></p>
        <label for="alfanumerico">Alfanumerico <input type="text" name="alfanumerico" id="alfanumerico" value="Apellido" ></label><br>
        <p><?php errores($errores,'alfanumerico'); ?></p>
        <label for="opalfanumerico">Alfanumerico Opcional<input type="text" name="opalfanumerico" id="opalfanumerico" value="opalfanumerico"></label><br>
        <p><?php errores($errores,'opalfanumerico'); ?></p>
        <label for="numerico">Numerico <input type="number" name="numerico" id="numerico" value="Numerico" ></label><br>
        <p><?php errores($errores,'numerico'); ?></p>
        <label for="opnumerico">Numerico opcional <input type="number" name="opnumerico" id="opnumerico" value="opnumerico"></label><br>
        <p><?php errores($errores,'opnumerico'); ?></p>
        <label for="fecha">Fecha <input type="date" name="fecha" id="fecha" value="dd/mm/aaaa" ></label><br>
        <p><?php errores($errores,'fecha'); ?></p>
        <label for="opfecha">Fecha Opcional <input type="date" name="opfecha" id="opfecha"></label><br>
        <p><?php errores($errores,'opfecha'); ?></p>
        Radio obligatorio<br>
        <label for="op1">Opcion1 <input type="radio" name="opcion[]" id="op1"></label>
        <label for="op2">Opcion2 <input type="radio" name="opcion[]" id="op2"></label>
        <label for="op3">Opcion3 <input type="radio" name="opcion[]" id="op3"></label><br>
        <p><?php errores($errores,'opcion'); ?></p>
        Select <select name="selecciona" id="selecciona">
            <option value="0">select1</option>
            <option value="select2">select2</option>
            <option value="select3">select3</option>
            <option value="select4">select4</option>
            <option value="select5">select5</option>
            <option value="select6">select6</option>
        </select><br>
        <p><?php errores($errores,'selecciona'); ?></p>
        Check<br>
        <?php
            for( $i = 1; $i <= 6; $i++ )
            echo "<label for='check'$i><input type='checkbox' name='check[]' id='check'$i value='check'$i>Check$i</input></label><br>"
        ?>
        <p><?php errores($errores,'check'); ?></p>
        <label for="tlf">Nº Telefono <input type="tel" name="tlf" id="tlf"></label><br>
        <p><?php errores($errores,'tlf'); ?></p>
        <label for="correo">Correo electrónico <input type="email" name="correo" id="correo" ></label><br>
        <p><?php errores($errores,'correo'); ?></p>
        <label for="contrasena">Contraseña <input type="password" name="contrasena" id="contrasena" ></label><br>
        <p><?php errores($errores,'contrasena'); ?></p>
        <label for="archivo">Subir documento <input type="file" name="archivo" id="archivo"></label><br>
        <p><?php errores($errores,'archivo'); ?></p>
        <input type="submit" name="Enviar" id="Enviar">
        
    </form>

</body>
</html>
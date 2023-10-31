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
        
        if(enviado() && validaFormulario($errores)){
            muestraFormulario();
        }else{
    ?>
    
    <form action="" method="post" name="formulario1" enctype="multipart/form-data">
        <h2>Formulario de registro</h2>
        <label for="alfabetico">Alfabetico <input type="text" name="alfabetico" id="alfabetico" value="<?php recuerda('alfabetico'); ?>" placeholder ="Nombre" required></label><span style= "color:red"><?php errores($errores,'alfabetico'); ?></span>
        <br><label for="opalfabetico">Alfabetico opcional <input type="text" name="opalfabetico" id="opalfabetico" value="<?php recuerda('opalfabetico'); ?>" placeholder ="Opcional nombre"></label><span style= "color:red"><?php errores($errores,'opalfabetico'); ?></span>
        <br><label for="alfanumerico">Alfanumerico <input type="text" name="alfanumerico" id="alfanumerico" value="<?php recuerda('alfanumerico'); ?>" placeholder ="Apellido" required></label><span style= "color:red"><?php errores($errores,'alfanumerico'); ?></span>
        <br><label for="opalfanumerico">Alfanumerico opcional <input type="text" name="opalfanumerico" id="opalfanumerico" value="<?php recuerda('opalfanumerico'); ?>" placeholder ="Opcional apellido" ></label><span style= "color:red"><?php errores($errores,'opalfanumerico'); ?></span>
        <br><label for="numerico">Numerico <input type="number" name="numerico" id="numerico" value="<?php recuerda('numerico'); ?>" placeholder ="Numerico" required></label><span style= "color:red"><?php errores($errores,'numerico'); ?></span>
        <br><label for="opnumerico">Numerico opcional <input type="number" name="opnumerico" id="opnumerico" value="<?php recuerda('opnumerico'); ?>" placeholder ="Opcional numérico" ></label><span style= "color:red"><?php errores($errores,'opnumerico'); ?></span>
        <br><label for="fecha">Fecha <input type="date" name="fecha" id="fecha" value="<?php recuerda('fecha'); ?>" required></label><span style= "color:red"><?php errores($errores,'fecha'); ?></span>
        <br><label for="opfecha">Fecha opcional <input type="date" name="opfecha" id="opfecha" value="<?php recuerda('opfecha'); ?>"></label><span style= "color:red"><?php errores($errores,'opfecha'); ?></span>
        <br>Radio obligatorio
        <br><label for="op1">Opcion1<input <?php recuerdaRadio('opcion','op1') ?> type="radio" name="opcion" id="op1" value="op1"></label>
        <label for="op2">Opcion2<input <?php recuerdaRadio('opcion','op2') ?> type="radio" name="opcion" id="op2" value="op2"></label>
        <label for="op3">Opcion3<input <?php recuerdaRadio('opcion','op3')?> type="radio" name="opcion" id="op3" value="op3"></label>
        <span style= "color:red"><?php errores($errores,'opcion'); ?></span>
        <br>Select <select name="selecciona" id="selecciona">
            <option value="0">select1</option>
            <option <?php recuerdaSelect('selecciona','select2') ?> value="select2">select2</option>
            <option <?php recuerdaSelect('selecciona','select3') ?> value="select3">select3</option>
            <option <?php recuerdaSelect('selecciona','select4') ?> value="select4">select4</option>
            <option <?php recuerdaSelect('selecciona','select5') ?> value="select5">select5</option>
            <option <?php recuerdaSelect('selecciona','select6') ?> value="select6">select6</option>
        </select>
        <span style= "color:red"><?php errores($errores,'selecciona'); ?></span><br>
        Check<br>
        <?php
            for( $i = 1; $i <= 6; $i++ )
            echo "<label for='check$i'><input ".recuerdaCheck('check','check'.$i). " type='checkbox' name='check[]' id='check$i' value='check$i'>Check$i</input></label><br>"
        ?>
        <span style= "color:red"><?php errores($errores,'check'); ?></span>
        <br><label for="tlf">Nº Telefono <input type="tel" name="tlf" id="tlf" value="<?php recuerda('tlf'); ?>" placeholder ="111111111" ></label>
        <span style= "color:red"><?php errores($errores,'tlf'); ?></span>
        <br><label for="correo">Correo electrónico <input type="email" name="correo" id="correo" value="<?php recuerda('correo'); ?>" placeholder ="prueba@prueba.com" required></label>
        <span style= "color:red"><?php errores($errores,'correo'); ?></span>
        <br><label for="contrasena">Contraseña <input type="password" name="contrasena" id="contrasena" value="<?php recuerda('contrasena'); ?>" required></label>
        <span style= "color:red"><?php errores($errores,'contrasena'); ?></span>
        <br><label for="archivo">Subir documento <input type="file" name="archivo" id="archivo"></label>
        <?php muestraImagen('archivo'); ?>
        <span style= "color:red"><?php errores($errores,'archivo'); ?></span>
        <br><input type="submit" name="Enviar" id="Enviar">
    </form>

    <?php
        }
        include("../../fragmentos/footer.php");
    ?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>

    <?php
        include("./procesa.php");
        if(enviado()){
            
        }
    ?>

    <form action="" method="get" name="formulario1">
    <label for="n1">Introduce el primer numero: <input type="number" name="n1" id="n1"></label><br>
    <label for="n2">Introduce el segundo numero: <input type="number" name="n2" id="n2"></label><br>
    <select name="signo" id="signo">
        <option value="0">Selecciona una opcion</option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br>
    <input type="submit" name="Enviar" id="Enviar">
    <input type="reset" name="Reiniciar" id="Reiniciar">
    </form>

</body>
</html>
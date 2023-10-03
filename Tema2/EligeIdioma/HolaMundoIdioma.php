<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
    </p>
    <?php
        $idioma1 = "frances";
        $idioma2 = "ingles";
        $idioma3 = "español";
        $idioma4 = "italiano";
        $idioma5 = "portugues";

        $idiomaelegido = "idioma"."1";

        echo $$idiomaelegido;
    ?>
</body>
</html>
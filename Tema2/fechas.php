<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo time();
    echo "<p>Zona que tiene el servidor</p>";
    echo date_default_timezone_get();
    date_default_timezone_set("Europe/Madrid");
    echo date_default_timezone_get();
    echo "<br>";
    echo date("r");
    echo "<br>";
    echo date("d/F/y H:i:s");
    echo "<br>";
    echo ("<p></p>");
    ?>
</body>
</html>
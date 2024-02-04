<?php
    require('curl.php');
    require('configurarAPI.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sorteo = get("sorteo?min=".$_REQUEST['min']."&max=".$_REQUEST['max']."");
        $sorteo = json_decode($sorteo, true);
    ?>
</body>
</html>
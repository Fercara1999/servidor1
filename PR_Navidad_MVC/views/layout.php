<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Librería Fernando</title>
</head>
<body>
    <?php
        require_once VIEW.'fragmentos/header.php';

    
    if(!isset($_SESSION['vista']))
        require_once VIEW.'home.php';
    else{
        require $_SESSION['vista'];
    }

        require_once VIEW.'fragmentos/footer.php';
    
    ?>
</body>
</html>
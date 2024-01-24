<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_SESSION['vista'])){
        require_once VIEW.'fragmentos/header.php';
        require_once VIEW.'home.php';
        require_once VIEW.'fragmentos/footer.php';
    }

        require_once VIEW.'fragmentos/header.php';
        require_once VIEW.'home.php';
        require_once VIEW.'fragmentos/footer.php';

    
        if(!isset($_SESSION['vista']))
            require VIEW.'home.php';
        else
            // require $_SESSION['vista'];
    
    ?>
</body>
</html>
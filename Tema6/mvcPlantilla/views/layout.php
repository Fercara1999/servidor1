<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <div>
            <form action="" method="post"> 
                <input type="submit" name="Home" id="Home" value="Home" class="btn btn-primary">
            </form>
        </div>    
        <h1>Página Web de Fernando</h1>
    </header>
    <main>
        <!-- Vistas -->
        <?php
            if(!isset($_SESSION['vista']))
                require VIEW.'home.php';
            else{
                require $_SESSION['vista'];
            }
        ?>

    </main>
    <footer>
        Copyright
    </footer>
</body>
</html>
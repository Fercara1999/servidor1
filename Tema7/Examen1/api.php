<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="min">Mínimo: <input type="number" name="min" id="min"></label><br>
        <label for="max">Máximo: <input type="number" name="max" id="max"></label><br>
        <input type="submit" name="creaResultados" id="creaResultados" value='Crea resultados'>
    </form> -->

    <?php
    require('./controllers/Base.php');
    require('./controllers/sorteosController.php');
        // print_r(Base::condiciones());

    if(isset($_SERVER['PATH_INFO'])){
        // Comprobar el recurso
        $recurso = Base::divideURI();
        // echo $recurso[1]; 
        if($recurso[1] === 'sorteos'){
            SorteosController::sorteos();
        }else{

        }
    }else{
        Base::response("HTTP/1.0 400 Direccion incorrecta, no se ha especificado el recurso");
    }

// ?>
// </body>
// </html>
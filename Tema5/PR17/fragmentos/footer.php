<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <style>
        html{
            padding: 20px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        footer {
            background-color: rgba(38, 65, 175, 255);
            padding-bottom: 0px;
            bottom: 0;
            width: 100%;
            color: white;
        }
        li{
            list-style: none;
        }

    </style>
    <?php
        if(isset($_REQUEST['login']))
            header('Location: ./sesiones.php');
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <footer>
        <div class="row">
            <div class="col-2"><a href="./index.php"><img src="./logo/logoGrandeInvertido.png" class="mt-2 ms-2" alt="" width="150px" height="100px"></a></div>
            <div class="col-3">
                <ul class="list-group">
                    <li class='me-5'><h3>Contacto</h3></li>
                    <li>Correo: admin@libreriafernando.com</li>
                    <li>Teléfono: +34 676 592 891</li>
                    <li>Dirección: Av. de Requejo, 4, 49012 Zamora</li>
                </ul>
            </div>
            <div class="col-3">
                <ul class="list-group">
                    <li class='me-5 d-flex'><h3>Métodos de pago</h3></li>
                    <li class="d-flex">
                        <img src="https://static.vecteezy.com/system/resources/previews/020/975/572/non_2x/visa-logo-visa-icon-transparent-free-png.png" alt="" style='width: 85px'>
                        <img src="https://brand.mastercard.com/content/dam/mccom/brandcenter/brand-history/brandhistory_mc_vrt_120_2x.png" alt="" style='width: 85px'>
                        <img src="https://coldhosting.com/wp-content/uploads/2021/09/logo-Paypal.png" alt="" style='width: 85px'>
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <ul class="list-group">
                    <li class='me-5'><h3>¡Suscríbete a nuestra newsletter!</h3></li>
                    <form class="d-flex" action="" method='post'>
                        <input type="email" name="correo" id="correo" class='form-control' style='width: 400px'>
                        <input type="submit" value="Suscribirme" class="btn btn-primary bg-success">
                    </form>
                </ul>
            </div>
            <?php
                
                ?>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

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

<footer>
    <div class="row">
        <div class="col-2"><a href="./index.php"><img src="<?php echo IMG.'logoGrandeInvertido.png' ?>" class="mt-2 ms-2" alt="" width="150px" height="100px"></a></div>
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
    </div>
</footer>
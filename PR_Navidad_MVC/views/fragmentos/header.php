<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<header class="container">
    <div class="row">
    <div class="col-3">
        <form method="post">
            <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;" id="botonHome" name="botonHome">
                <img src="<?php echo IMG."logoGrande.png" ?>" class="mb-2" alt="" width="150px" height="100px">
            </button>
        </form>
    </div>
        <div class="col-6 mx-auto">
            <form method="post" class="d-flex mt-4">
                <input type="text" class="form-control" style="width: 300px;" name="busqueda" id="busqueda" placeholder="Introduce tu búsqueda">
                <input type="submit" class='btn btn-primary' name="buscar" id="buscar" value="Buscar">
            </form>    
        </div>
        <div class="col-3 mx-auto">
            <?php
                muestraHeaderUsuario();
            ?>
        </div>
    </div>
    <style>
        .imagenSlider{
            height: 400px;
        }
    </style>
</header>
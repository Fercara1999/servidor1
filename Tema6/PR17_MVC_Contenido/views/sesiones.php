<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<body>

    <?php

        if(isset($_SESSION['usuario']))
            header("Location: ./index.php");

        $erroresRegistro = [];

            // if(isset($_REQUEST['iniciarSesion'])){
            //     if(!campoVacio('usuario') && !campoVacio('contrasena')){
            //         $usuario = validaUsuario($_REQUEST['usuario'],$_REQUEST['contrasena']);
            //         if(!$usuario){
            //             echo '<div class="container mt-5 text-center">';
            //             echo '<h1 class="mb-4">Usuario o contraseña incorrectos</h1></div>';
            //         }else{
            //             $_SESSION['usuario'] = $usuario;
            //             header("Location: ./index.php");
            //             exit;
            //         }
            //     }
            // }


            if(pulsadoBoton('registrar') && validaRegistro($erroresRegistro)){
                if(insertaUsuario()){
                    echo '<div class="container mt-5 text-center">';
                    echo '<h1 class="mb-4">Registro completado con exito</h1></div>';
                }else{
                    echo '<div class="container mt-5 text-center">';
                    echo '<h1 class="mb-4">Error en el registro</h1></div>';
                }
            }else{
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">Regístrate</div>
                        <div class="card-body ">
                            <form action="" method="post">
                                <div class="d-flex align-items-center mb-3">
                                    <label for="usuario" class="form-label me-2">Usuario:</label>
                                    <input type="text" name="usuario" id="usuario" class="form-control" value="<?php recuerda('usuario')?>">
                                    <?php muestraError($erroresRegistro,'usuario') ?>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <label for="contrasena" class="form-label me-2">Contraseña:</label>
                                    <input type="password" name="contrasena" id="contrasena" class="form-control" value="<?php recuerda('contrasena') ?>">
                                    <?php muestraError($erroresRegistro,'contrasena') ?>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <label for="repContrasena" class="form-label me-2">Repite tu contraseña:</label>
                                    <input type="password" name="repContrasena" id="repContrasena" class="form-control" value="<?php recuerda('contrasena') ?>">
                                    <?php muestraError($erroresRegistro,'repContrasena') ?>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <label for="correo" class="form-label me-2">Correo electrónico:</label>
                                    <input type="email" name="correo" id="correo" class="form-control" value="<?php recuerda('correo') ?>">
                                    <?php muestraError($erroresRegistro,'correo') ?>
                                </div>
                                <div class="d-flex align-items-center">
                                    <label for="fechaNacimiento" class="form-label me-2">Fecha de nacimiento:</label>
                                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="<?php recuerda('fechaNacimiento') ?>">
                                    <?php muestraError($erroresRegistro,'fechaNacimiento') ?>
                                </div>
                                <button id="registrar" value="registrar" name="registrar" class="mt-3 btn btn-primary">Enviar Datos</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">Iniciar sesión</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="d-flex align-items-center mb-3">
                                    <label for="usuario" class="form-label me-2">Usuario:</label>
                                    <input type="text" name="usuario" id="usuario" class="form-control">
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <label for="contrasena" class="form-label me-2">Contraseña:</label>
                                    <input type="password" name="contrasena" id="contrasena" class="form-control">
                                </div>
                                <button name="iniciarSesion" value="iniciarSesion" class="mt-3 btn btn-primary">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
</body>
</html>
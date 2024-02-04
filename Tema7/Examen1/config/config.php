<?php

// Constantes a usar en toda la aplicación
define('IMG','./webroot/img/');
define('CSS','./webroot/css/');
define('JS','./webroot/js/');
define('VIEW','./views/');
define('CON','./controllers/');

require("./core/funciones.php");

require("./config/configBD.php");

require("./dao/factoryBD.php");

require("./models/usuario.php");
require("./dao/usuarioDAO.php");

require("./models/apuesta.php");
require("./dao/apuestaDAO.php");

require("./models/sorteo.php");
require("./dao/sorteoDAO.php");

?>
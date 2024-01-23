<?php

// Constantes a usar en toda la aplicación
define('IMG','./webroot/img/');
define('CSS','./webroot/css/');
define('JS','./webroot/js/');
define('VIEW','./views/');
define('CON','./controllers/');

require("./core/funciones.php");
require("./core/insertaScript.php");

require("./config/configBD.php");

require("./dao/libroDAO.php");
require("./dao/albaranDAO.php");
require("./dao/pedidoDAO.php");
require("./dao/userDAO.php");

require("./dao/factoryBD.php");
// require("./models/user.php");
// require("./dao/userDAO.php");

?>
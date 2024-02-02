<?php

// Constantes a usar en toda la aplicación
define('IMG','./webroot/img/');
define('CSS','./webroot/css/');
define('JS','./webroot/js/');
define('VIEW','./views/');
define('CON','./controllers/');

require("./core/funciones.php");

require("./config/configBD.php");

require("./dao/libroDAO.php");

require("./dao/factoryBD.php");
require("./models/user.php");
require("./dao/userDAO.php");

require("./models/pedido.php");
require("./dao/pedidoDAO.php");

require("./models/albaran.php");
require("./dao/albaranDAO.php");

// require("./models/cita.php");
// require("./dao/citaDAO.php");

?>
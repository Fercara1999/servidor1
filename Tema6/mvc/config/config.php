<?php

// Constantes a usar en toda la aplicación
define('IMG','./webroot/img/');
define('CSS','./webroot/css/');
define('JS','./webroot/js/');

require("./config/configBD.php");

require("./dao/factoryBD.php");
require("./models/user.php");
require("./dao/userDAO.php");

?>
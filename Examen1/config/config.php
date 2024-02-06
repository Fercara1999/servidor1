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

require("./models/palabra.php");
require("./dao/palabraDAO.php");

require("./models/estadistica.php");
require("./dao/estadisticaDAO.php");
// require("./models/user.php");
// require("./dao/userDAO.php");

// require("./models/cita.php");
// require("./dao/citaDAO.php");

?>
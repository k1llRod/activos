<?php
require_once 'controllers/template.php';
require_once 'controllers/links.php';
require_once 'controllers/login.php';
require_once 'controllers/configuration.php';
require_once 'controllers/account_asset.php';
require_once 'controllers/employee.php';
require_once 'controllers/assignment.php';

require_once 'models/conexion.php';
require_once 'models/links.php';
require_once 'models/login.php';
require_once 'models/configuration.php';
require_once 'models/account_asset.php';
require_once 'models/employee.php';
require_once 'models/assignment.php';



#require_once 'modelo/enlaces.php';


$template = new templateControllers();
$template->template();

 ?>
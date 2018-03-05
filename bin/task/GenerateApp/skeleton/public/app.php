<?php

$skeleton = <<<BLOCK
<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';
require '../config/MyConfig.php';
require '../config/ControllerExtends.php';
require '../config/FrontControllerExtends.php';
require '../config/Config.php';

use $app\\config\\FrontControllerExtends;

try
{
  \$app = new FrontControllerExtends(\$config);
  \$app->run();
}
catch (\Exception \$exc)
{
  echo '<pre>';
  echo \$exc->getMessage();
  echo \$exc->getTraceAsString();
  echo '</pre>';
}

BLOCK;

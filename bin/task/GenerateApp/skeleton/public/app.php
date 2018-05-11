<?php

$skeleton = <<<BLOCK
<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';
require '../config/Config.php';

use $app\\config\\ExtendedFrontController;

try
{
  \$app = new ExtendedFrontController(\$config);
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

<?php

$skeleton = <<<BLOCK
<?php

use $app\\config\\MyConfig;

\$config = new MyConfig();

\$config->SetDrive('DRIVER')
  ->SetHost('HOST')
  ->SetPort(PORT)
  ->SetUser('USER')
  ->SetPassword('PASSWORD')
  ->SetDbname('DATABASE');

\$config->SetHash('HASH')
  ->SetI18n('en')
  ->SetPath('$output')
  ->SetUrl('http://localhost/$app/public/$app.php');

BLOCK;

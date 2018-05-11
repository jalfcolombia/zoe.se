<?php

$skeleton = <<<BLOCK
<?php

use $app\\Config\\MyConfig;

\$config = new MyConfig();

\$config->setDrive('DRIVER')
  ->setHost('HOST')
  ->setPort(PORT)
  ->setUser('USER')
  ->setPassword('PASSWORD')
  ->setDbname('DATABASE');

\$config->setHash('HASH')
  ->setI18n('en')
  ->setPath('$output')
  ->setUrl('http://localhost/$app/public/$app.php');

BLOCK;

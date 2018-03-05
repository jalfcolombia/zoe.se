<?php

$skeleton = <<<BLOCK
<?php

use $app\\config\\MyConfig;

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
  ->setUrl('http://localhost/$app/public/');

BLOCK;

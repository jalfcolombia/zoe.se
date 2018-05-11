<?php

$skeleton = <<<BLOCK
<?php

namespace $app\\Config;

use $app\\Config\\MyConfig;
use ZoeSE\\Controller;
use ZoeSE\\Session;
use ZoeSE\\i18n;

abstract class ExtendedController extends Controller
{

  public function __construct(MyConfig \$config, Session \$session, i18n \$i18n)
  {
    parent::__construct(\$config, \$session, \$i18n);
  }

  public function getConfig(): MyConfig
  {
    return parent::getConfig();
  }

}

BLOCK;

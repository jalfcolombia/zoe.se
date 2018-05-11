<?php

$skeleton = <<<BLOCK
<?php

namespace $app\\config;

use $app\\config\\MyConfig;
use ZoeSE\\Controller;
use ZoeSE\\Session;
use ZoeSE\\i18n;

abstract class ControllerExtends extends Controller
{

  public function __construct(MyConfig \$config, Session \$session, i18n \$i18n)
  {
    parent::__construct(\$config, \$session, \$i18n);
  }

}

BLOCK;

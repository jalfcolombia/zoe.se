<?php

$skeleton = <<<BLOCK
<?php

namespace $app\\config;

use $app\\config\\MyConfig;
use ZoeSE\\FrontController;

class FrontControllerExtends extends FrontController
{

  public function __construct(MyConfig \$config)
  {
    parent::__construct(\$config);
  }

}

BLOCK;

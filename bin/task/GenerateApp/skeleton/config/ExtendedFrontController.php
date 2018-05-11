<?php

$skeleton = <<<BLOCK
<?php

namespace $app\\Config;

use $app\\Config\\MyConfig;
use ZoeSE\\FrontController;

class ExtendedFrontController extends FrontController
{

  public function __construct(MyConfig \$config)
  {
    parent::__construct(\$config);
  }

}

BLOCK;

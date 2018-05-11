<?php

$skeleton = <<<BLOCK
<?php

use $app\\Config\\ExtendedController;
use ZoeSE\\Request;
use Exception;

class HelloWorld extends ExtendedController
{

  public function main(Request \$request)
  {
    \$this->setParam('name', \$this->i18n()->__('hi', 'World'));
    \$this->setView('HelloWorld');
  }

}

BLOCK;

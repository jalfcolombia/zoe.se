<?php

$skeleton = <<<BLOCK
<?php

use $app\\config\\ControllerExtends;
use ZoeSE\\Request;

class HelloWorld extends ControllerExtends
{

  public function main(Request \$request)
  {
    \$this->setParam('name', \$this->i18n()->__('hi', 'World'));
    \$this->setView('HelloWorld');
  }

}

BLOCK;

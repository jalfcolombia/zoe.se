<?php

$skeleton = <<<BLOCK
<?php

use $app\\ControllerExtends;
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

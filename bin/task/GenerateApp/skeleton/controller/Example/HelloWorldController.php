<?php

$skeleton = <<<BLOCK
<?php

use $app\\ControllerExtends;
use ZoeSE\\Request;

class HelloWorld extends ControllerExtends
{

  public function Main(Request \$request)
  {
    \$this->SetParam('name', \$this->i18n()->__('hi', 'World'));
    \$this->SetView('HelloWorld');
  }

}

BLOCK;

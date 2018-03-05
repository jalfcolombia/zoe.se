<?php

$skeleton = <<<BLOCK
<?php

use $app\\config\\ControllerExtends;
use ZoeSE\\Request;

class HelloWorld extends ControllerExtends
{

  public function main(Request \$request)
  {
    \$this->setParam('answer', array('msg' => \$this->i18n()->__('HelloWorld')));
    \$this->setResponseCode(200);
    \$this->setView('printJSON');
  }

}

BLOCK;

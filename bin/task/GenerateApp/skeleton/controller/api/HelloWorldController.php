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
    \$this->setParam('answer', array('msg' => \$this->i18n()->__('HelloWorld')));
    \$this->setResponseCode(200);
    \$this->setView('printJSON');
  }

}

BLOCK;

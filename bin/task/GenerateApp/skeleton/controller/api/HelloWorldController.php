<?php

$skeleton = <<<BLOCK
<?php

use $app\\ControllerExtends;
use ZoeSE\\Request;

class HelloWorld extends ControllerExtends
{

  public function Main(Request \$request)
  {
    \$this->SetParam('answer', array('msg' => \$this->i18n()->__('HelloWorld')));
    \$this->SetResponseCode(200);
    \$this->SetView('printJSON');
  }

}

BLOCK;

<?php

namespace ZoeSE\Task;

use ZoeSE\intf\ITask;

class GenerateApp implements ITask
{

  private $params;
  private $output;
  private $app;

  public function __construct($value, $params)
  {
    $this->app    = $value;
    $this->params = $params;
    $data         = explode(':', $params[2], 2);
    $this->output = ($data[0] === 'output') ? $data[1] : false;
  }

  public function main()
  {
    if (is_dir($this->output) === true)
    {
      $this->CreateDirectories();
      $this->CreateConfigFiles();
      $this->CreateControllerFilesExample();
      $this->Createi18nFile();
      $this->CreateViewFiles();
      $this->CreatePublicFiles();
    }
    else
    {
      throw new \Exception('El directorio otorgado ("' . $this->output . '") no existe o no es un directorio.');
    }
  }

  private function CreateDirectories()
  {
    mkdir($this->output . 'config/');
    mkdir($this->output . 'controller/');
    mkdir($this->output . 'i18n/');
    mkdir($this->output . 'model/');
    mkdir($this->output . 'validator/');
    mkdir($this->output . 'view/');
    mkdir($this->output . 'public/');
  }

  private function CreateConfigFiles()
  {
    $app    = $this->app;
    $output = $this->output;

    // Config.php
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'Config.php';
    $file = fopen($this->output . 'config/Config.php', 'w');
    fwrite($file, $skeleton);
    fclose($file);

    // ExtendedController.php
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'ExtendedController.php';
    $file = fopen($this->output . 'config/ExtendedController.php', 'w');
    fwrite($file, $skeleton);
    fclose($file);

    // FrontControllerExtends.php
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'FrontExtendedController.php';
    $file = fopen($this->output . 'config/FrontExtendedController.php', 'w');
    fwrite($file, $skeleton);
    fclose($file);

    // MyConfig.php
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'MyConfig.php';
    $file = fopen($this->output . 'config/MyConfig.php', 'w');
    fwrite($file, $skeleton);
    fclose($file);
  }

  private function CreateControllerFilesExample()
  {
    $app = $this->app;
    mkdir($this->output . 'controller/Example/');
    mkdir($this->output . 'controller/api/');

    // HelloWorldController.php
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'Example' . DIRECTORY_SEPARATOR . 'HelloWorldController.php';
    $file = fopen($this->output . 'controller/Example/HelloWorldController.php', 'w');
    fwrite($file, $skeleton);
    fclose($file);

    // HelloWorldController.php
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'api' . DIRECTORY_SEPARATOR . 'HelloWorldController.php';
    $file = fopen($this->output . 'controller/api/HelloWorldController.php', 'w');
    fwrite($file, $skeleton);
    fclose($file);
  }

  private function Createi18nFile()
  {
    // en.yml
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . 'en.php';
    $file = fopen($this->output . 'i18n/en.yml', 'w');
    fwrite($file, $skeleton);
    fclose($file);
  }

  public function CreateViewFiles()
  {
    // template.HelloWorld.php
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'template.HelloWorld.php';
    $file = fopen($this->output . 'view/template.HelloWorld.php', 'w');
    fwrite($file, $skeleton);
    fclose($file);

    // template.printJSON.php
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'template.printJSON.php';
    $file = fopen($this->output . 'view/template.printJSON.php', 'w');
    fwrite($file, $skeleton);
    fclose($file);
  }

  public function CreatePublicFiles()
  {
    $app = $this->app;
    mkdir($this->output . 'public/css/');
    mkdir($this->output . 'public/js/');
    mkdir($this->output . 'public/img/');

    // app.php
    require __DIR__ . DIRECTORY_SEPARATOR . 'GenerateApp' . DIRECTORY_SEPARATOR . 'skeleton' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'app.php';
    $file = fopen($this->output . 'public/' . $app . '.php', 'w');
    fwrite($file, $skeleton);
    fclose($file);
  }

}

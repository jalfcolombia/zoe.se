<?php

/**
 * This file is part of the ZoeSE package.
 *
 * (c) Julian Lasso <jalasso69@misena.edu.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZoeSE;

use ZoeSE\Request,
    ZoeSE\Session,
    ZoeSE\View,
    ZoeSE\Route,
    ZoeSE\Config;

/**
 * Controlador frontal
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class FrontController
{

  /**
   * Variable con la configuración del sistema
   * 
   * @var Config
   */
  private $config;

  /**
   * Variable con en nombre del controlador solicitado
   * 
   * @var controller
   */
  private $controller;

  /**
   * Variable con el nombre de la carpeta (módulo) ubicada en la carpeta controller
   * 
   * @var string 
   */
  private $folder;

  /**
   * Variable que guarda los parametros pasados por la URL de forma amigable
   * 
   * @var array
   */
  private $paramsURL;

  /**
   * Constructor de la clase FrontController
   * 
   * @param Config $config
   */
  public function __construct(Config $config)
  {
    $this->config    = $config;
    $this->folder    = null;
    $this->paramsURL = array();
  }

  /**
   * Obtiene el objeto de configuración del sistema
   * 
   * @return Config
   */
  protected function getConfig(): Config
  {
    return $this->config;
  }

  /**
   * Establece el objecto de configuración del sistema
   * 
   * @param Config $config Objeto de configuración del sistema
   */
  protected function setConfig(Config $config)
  {
    $this->config = $config;
  }

  /**
   * Método para correr toda la plataforma
   * 
   * @throws \Exception
   */
  public function run()
  {
    try
    {
      //$this->loadLibs();
      $this->friendURL();
      $this->loadController();
      $request    = $this->loadRequest();
      $session    = new Session();
      $i18n       = new i18n($this->getConfig(), $session);
      $controller = new $this->controller($this->getConfig(), $session, $i18n);
      $controller->main($request);
      $view       = new View($this->getConfig()->getPath(), $controller->getView(), $controller->getParams());
      $view->render();
    }
    catch (\Exception $exc)
    {
      throw new \Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }

  /**
   * Método para procesar la dirección y extraer nombre de módulo y controlador
   * a utlizar.
   */
  private function friendURL()
  {
    $route  = new Route();
    $routes = $route->getRoutes();
    if (isset($routes[2]) === false)
    {
      $this->controller = 'Index';
    }
    elseif (isset($routes[2]) === true and isset($routes[3]) === true and is_dir($this->getConfig()->getPath() . 'controller/' . $routes[2]) === true)
    {
      $this->folder     = $routes[2];
      $this->controller = str_replace(' ', '', ucwords(str_replace('_', ' ', $routes[3])));
      unset($routes[3]);
    }
    else if (isset($routes[2]) === true)
    {
      $this->controller = str_replace(' ', '', ucwords(str_replace('_', ' ', $routes[2])));
    }
    unset($routes[0], $routes[1], $routes[2]);
    if (is_array($routes) === true and count($routes) > 0)
    {
      $this->paramsURL = array_values($routes);
    }
  }

//  protected function loadLibs()
//  {
//    require $this->getConfig()->getPath() . 'vendor/ZoeMVC/core/Interfaces/IValidator.php';
//    require $this->getConfig()->getPath() . 'vendor/ZoeMVC/core/Controller.php';
//    require $this->getConfig()->getPath() . 'config/ControllerExtends.php';
//    require $this->getConfig()->getPath() . 'vendor/ZoeMVC/core/Request.php';
//    require $this->getConfig()->getPath() . 'vendor/ZoeMVC/core/Session.php';
//    require $this->getConfig()->getPath() . 'vendor/ZoeMVC/core/View.php';
//    require $this->getConfig()->getPath() . 'vendor/ZoeMVC/core/Validate.php';
//    require $this->getConfig()->getPath() . 'vendor/ZoeMVC/core/Route.php';
//    require $this->getConfig()->getPath() . 'vendor/ZoeMVC/core/i18n.php';
//  }

  /**
   * Método para cargar el controlador solicitado por el usuario
   */
  private function loadController()
  {
    if ($this->folder !== null)
    {
      require $this->getConfig()->getPath() . 'controller/' . $this->folder . '/' . $this->controller . 'Controller.php';
    }
    else
    {
      require $this->getConfig()->getPath() . 'controller/' . $this->controller . 'Controller.php';
    }
  }

  /**
   * Método para iniciar el objeto que maneja las peticiones del sistema
   * 
   * @return Request
   */
  private function loadRequest(): Request
  {
    $getTMP = (is_array(filter_input_array(INPUT_GET)) === true) ? filter_input_array(INPUT_GET) : array();
    $get    = array_merge($this->paramsURL, $getTMP);
    $post   = (filter_input_array(INPUT_POST)) ? filter_input_array(INPUT_POST) : array();
    $cookie = (filter_input_array(INPUT_COOKIE)) ? filter_input_array(INPUT_COOKIE) : array();
    $put    = array();
    $delete = array();
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'PUT')
    {
      parse_str(file_get_contents("php://input"), $put);
    }
    else if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'DELETE')
    {
      parse_str(file_get_contents("php://input"), $delete);
    }
    return new Request($get, $post, $put, $delete, $cookie, $_FILES);
  }

}

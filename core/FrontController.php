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

use ZoeSE\Request;
use ZoeSE\Session;
use ZoeSE\View;
use ZoeSE\Route;
use ZoeSE\Config;

/**
 * Controlador frontal
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class FrontController
{

  /**
   * Objeto con la configuración del sistema
   * 
   * @var Config
   */
  private $config;

  /**
   * Objeto del controlador solicitado
   * 
   * @var controller
   */
  private $controller;

  /**
   * Folder del módulo solicitado
   * 
   * @var string 
   */
  private $folder;

  /**
   * Arreglo con los parametros pasados por la URL de forma amigable.
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
   * Devuelve el objeto con la configuración del sistema.
   * 
   * @return Config
   */
  protected function getConfig(): Config
  {
    return $this->config;
  }

  /**
   * Establece el objeto configurador del sistema.
   * 
   * @param Config $config
   */
  protected function setConfig(Config $config)
  {
    $this->config = $config;
  }

  /**
   * Método para iniciar el sistema.
   * 
   * @throws Exception
   */
  public function run()
  {
    try {
      $this->friendURL();
      $this->loadController();
      $request    = $this->loadRequest();
      $session    = new Session();
      $i18n       = new i18n($this->getConfig(), $session);
      $controller = new $this->controller($this->getConfig(), $session, $i18n);
      $controller->main($request);
      $view       = new View($this->getConfig(), $controller->getView(), $controller->getParams());
      $view->render();
    }
    catch (\Exception $exc) {
      throw new Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }

  /**
   * Método para tratar las direcciones amigables.
   */
  private function friendURL()
  {
    $route  = new Route();
    $routes = $route->getRoutes();
    if (isset($routes[2]) === false) {
      $this->controller = 'Index';
    }
    elseif (isset($routes[2]) === true and isset($routes[3]) === true and is_dir($this->getConfig()->getPath() . 'controller/' . $routes[2]) === true) {
      $this->folder     = $routes[2];
      $this->controller = str_replace(' ', '', ucwords(str_replace('_', ' ', $routes[3])));
      unset($routes[3]);
    }
    else if (isset($routes[2]) === true) {
      $this->controller = str_replace(' ', '', ucwords(str_replace('_', ' ', $routes[2])));
    }
    unset($routes[0], $routes[1], $routes[2]);
    if (is_array($routes) === true and count($routes) > 0) {
      $this->paramsURL = array_values($routes);
    }
  }

  /**
   * Método para cargar el controlador solicitado.
   */
  private function loadController()
  {
    if ($this->folder !== null) {
      require $this->getConfig()->getPath() . 'controller/' . $this->folder . '/' . $this->controller . 'Controller.php';
    }
    else {
      require $this->getConfig()->getPath() . 'controller/' . $this->controller . 'Controller.php';
    }
  }

  /**
   * Método para cargar las peticiones realizadas al sistema.
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
    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'PUT') {
      parse_str(file_get_contents("php://input"), $put);
    }
    else if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'DELETE') {
      parse_str(file_get_contents("php://input"), $delete);
    }
    return new Request($get, $post, $put, $delete, $cookie, $_FILES);
  }

}

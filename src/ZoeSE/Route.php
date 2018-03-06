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

/**
 * Clase para manejar la ruta de una URL amigable
 * 
 * @link http://www.weblantropia.com/2016/07/28/enrutamiento-urls-htaccess-php/ Dirección de origen de la clase
 */
class Route
{

  private $basepath;
  private $uri;
  private $base_url;
  private $routes;
  private $params;
  private $get_params;

  /**
   * 
   * @param bool $get_params Establece si se van a tomar los parámetros
   * provenientes por el método GET adicionales.
   */
  function __construct($get_params = false)
  {
    $this->get_params = $get_params;
  }

  public function getRoutes()
  {
    $this->base_url = $this->getCurrentUri();
    $this->routes   = explode('/', $this->base_url);

    $this->getParams(); //invocamos el neuvo método
    return $this->routes;
  }

  private function getCurrentUri()
  {
    $this->basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $this->uri      = substr($_SERVER['REQUEST_URI'], strlen($this->basepath));

    if ($this->get_params)
    {
      $this->getParams();
    }
    elseif (strstr($this->uri, '?'))
    {
      $this->uri = substr($this->uri, 0, strpos($this->uri, '?'));
    }

    $this->uri = '/' . trim($this->uri, '/');
    return $this->uri;
  }

  private function getParams()
  {
    if (strstr($this->uri, '?'))
    {
      $params = explode("?", $this->uri);
      $params = $params[1];

      parse_str($params, $this->params);
      $this->routes[0] = $this->params;
      array_pop($this->routes);
    }
  }

}

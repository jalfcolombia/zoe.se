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
 * Clase para manejar la ruta de una URL amigable.<br>
 * La clase ha sido modificada ligeramente por Julian Lasso para el
 * acondicionamiento en Zoe (Student Edition)
 * 
 * @author Federico Guzman <https://twitter.com/kraiosis/>
 * @link http://www.weblantropia.com/2016/07/28/enrutamiento-urls-htaccess-php/ Dirección de origen de la clase
 */
class Route
{

  /**
   * 
   * @var array 
   */
  private $basepath;
  
  /**
   *
   * @var string 
   */
  private $uri;
  
  /**
   *
   * @var string 
   */
  private $base_url;
  
  /**
   *
   * @var array 
   */
  private $routes;
  
  /**
   *
   * @var array 
   */
  private $params;
  
  /**
   *
   * @var bool 
   */
  private $get_params;

  /**
   * Constructor de la clase Route
   * 
   * @param bool $get_params Indicador de la existencia de variables por el método GET
   */
  function __construct(bool $get_params = false)
  {
    $this->get_params = $get_params;
  }

  /**
   * Obtiene el arreglo de rutas y variables entrantes por el método GET
   * 
   * @return array
   */
  public function getRoutes(): array
  {
    $this->base_url = $this->getCurrentUri();
    $this->routes   = explode('/', $this->base_url);

    $this->getParams(); //invocamos el nuevo método
    return $this->routes;
  }

  /**
   * Obtiene la dirección amigable después del .php
   * 
   * @return srting Cadena con el dirección amigable
   */
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

  /**
   * Obtiene las variables que entran por el método GET
   */
  private function getParams(): void
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

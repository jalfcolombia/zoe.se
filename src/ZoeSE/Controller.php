<?php

namespace ZoeSE;

use ZoeSE\Config;
use ZoeSE\Session;
use ZoeSE\i18n;

/**
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
abstract class Controller
{

  /**
   * Variable con objeto de configuración
   * @access private
   * @var Config
   */
  private $config;

  /**
   * Array con las variables que pasan del controlador a la vista
   * @access private
   * @var array
   */
  private $params;

  /**
   * Nombre de la vista a usar por el controlador
   * @access private
   * @var string
   */
  private $view;

  /**
   * Objeto para el manejo de sesiones
   * @access private
   * @var Session
   */
  private $session;

  /**
   *
   * @access private
   * @var i18n
   */
  private $i18n;

  /**
   * Metodo principal abstracto a implementar en los controladores del sistemas
   */
  abstract function main(Request $request);

  public function __construct(Config $config, Session $session, i18n $i18n)
  {
    $this->config  = $config;
    $this->session = $session;
    $this->i18n    = $i18n;
    $this->params  = array();
  }

  /**
   * 
   * @return Config
   */
  public function getConfig()
  {
    return $this->config;
  }

  public function getParams()
  {
    return $this->params;
  }

  public function getView()
  {
    return $this->view;
  }

  /**
   * 
   * @return Session
   */
  public function getSession()
  {
    return $this->session;
  }

  /**
   * 
   * @return i18n
   */
  public function i18n()
  {
    return $this->i18n;
  }

  /**
   * 
   * @param string $param
   * @param mixed $value
   * @return $this
   */
  public function setParam(string $param, $value)
  {
    $this->params[$param] = $value;
    return $this;
  }

  /**
   * 
   * @param string $view
   * @return $this
   */
  public function setView(string $view)
  {
    $this->view = $view;
    return $this;
  }

  /**
   * Setea el código de respuesta HTTP para el navegador
   * @param int $code
   * @return $this
   */
  public function setResponseCode(int $code)
  {
    http_response_code($code);
    return $this;
  }

  public function getResponseCode()
  {
    return http_response_code();
  }

  /**
   * Establece cabecera http
   * 
   * @param string $name Nombre del parámetro
   * @param string $value Valor del parámetro
   * @return void
   */
  public function setHeader(string $name, string $value): void
  {
    header("{$name}: {$value}");
  }

  /**
   * Obtiene el encabezado a enviar en la petición HTTP
   *
   * @return array
   */
  public function getHeader(): array
  {
    return headers_list();
  }

}

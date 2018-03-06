<?php

namespace ZoeSE;

use ZoeSE\Config,
    ZoeSE\Session,
    ZoeSE\i18n;

/**
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
abstract class Controller
{

  /**
   * Variable con objeto de configuración
   * 
   * @access private
   * @var Config
   */
  private $config;

  /**
   * Array con las variables que pasan del controlador a la vista
   * 
   * @access private
   * @var array
   */
  private $params;

  /**
   * Nombre de la vista a usar por el controlador
   * 
   * @access private
   * @var string
   */
  private $view;

  /**
   * Objeto para el manejo de sesiones
   * 
   * @access private
   * @var Session
   */
  private $session;

  /**
   * Objeto para el manejo del idioma del sistema
   * 
   * @access private
   * @var i18n
   */
  private $i18n;

  /**
   * Metodo principal abstracto a implementar en los controladores del sistemas
   */
  abstract function main(Request $request);

  /**
   * 
   * @param Config $config Variable con objeto de configuración
   * @param Session $session Objeto para el manejo de sesiones
   * @param i18n $i18n Objeto para el manejo del idioma del sistema
   */
  public function __construct(Config $config, Session $session, i18n $i18n)
  {
    $this->config  = $config;
    $this->session = $session;
    $this->i18n    = $i18n;
    $this->params  = array();
  }

  /**
   * Obtiene la configuración del sistema
   * 
   * @return Config
   */
  public function getConfig()
  {
    return $this->config;
  }

  /**
   * Devuelve un array con los parámetro que se pasarán a la visa
   * 
   * @return array
   */
  public function getParams(): array
  {
    return $this->params;
  }

  /**
   * Obtiene el nombre de la visa definida
   * 
   * @return string
   */
  public function getView(): string
  {
    return $this->view;
  }

  /**
   * Obtiene el objeto para manejar las sesiones
   * 
   * @return Session
   */
  public function getSession(): Session
  {
    return $this->session;
  }

  /**
   * Obtiene la instancia de la clase i18n
   * 
   * @return i18n
   */
  public function i18n(): i18n
  {
    return $this->i18n;
  }

  /**
   * Establece un parámetro hacia la vista
   * 
   * @param string $param Nombre del parámetro
   * @param mixed $value Valor del parámetro
   * @return $this
   */
  public function setParam(string $param, $value): Controller
  {
    $this->params[$param] = $value;
    return $this;
  }

  /**
   * Establece la vista a utilizar
   * 
   * @param string $view Nombre de la vista
   * @return $this
   */
  public function setView(string $view): Controller
  {
    $this->view = $view;
    return $this;
  }

  /**
   * Establece el código de respuesta HTTP para el navegador
   * 
   * @param int $code Código HTTP
   * @return $this
   */
  public function setResponseCode(int $code): Controller
  {
    http_response_code($code);
    return $this;
  }

  /**
   * Obtiene el código de respuesta HTTP para el cliente
   * 
   * @return int
   */
  public function getResponseCode(): int
  {
    return http_response_code();
  }

}

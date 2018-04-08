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

use ZoeSE\Config;
use ZoeSE\Session;

/**
 * Clase para manejar la internacionalización de los mensajes en el sistema
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class i18n
{

  /**
   * Objecto con la configuración del sistema
   * 
   * @var Config
   */
  private $config;

  /**
   * Objeto para el manejo de las sesiones del sistema
   * 
   * @var Session
   */
  private $session;

  /**
   * Constructor de la clase i18n
   * 
   * @param Config $config Objecto con la configuración del sistema
   * @param Session $session Objeto para el manejo de las sesiones del sistema
   */
  public function __construct(Config $config, Session $session)
  {
    $this->config  = $config;
    $this->session = $session;
  }

  /**
   * Devuelve el mensaje indicado en el idioma configurado
   * 
   * @param string $text Clave del mensaje
   * @param array | string [$args] Arreglo o cadena de caracteres que se usará en el mensaje devuelto
   * @return string
   */
  public function __(string $text, $args): string
  {
    $yaml = $this->LoadYamlCache();
    if (is_string($args) === true) {
      $answer = sprintf($yaml[$text], $args);
    }
    elseif (is_array($args) === true) {
      $answer = vsprintf($yaml[$text], $args);
    }
    return $answer;
  }

  /**
   * Devuelve arreglo con el diccionario de mensajes del sistema. El método<br>
   * Los carga del archivo YAML o de la sessión establecida
   * 
   * @return array Arreglo con diccionario de mensajes del sistema
   */
  private function LoadYamlCache(): array
  {
    if ($this->session->Has('i18n') === true) {
      $yaml = $this->session->Get('i18n');
    }
    else {
      $yaml = yaml_parse_file($this->config->GetPath() . 'i18n/' . $this->config->GetI18n() . '.yml');
      $this->session->Set('i18n', $yaml);
    }
    return $yaml;
  }

}

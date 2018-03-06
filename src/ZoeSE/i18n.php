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

use ZoeSE\Config,
    ZoeSE\Session;

/**
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class i18n
{

  /**
   * Objeto con la configuración del sistema
   * 
   * @var Config
   */
  private $config;

  /**
   * Objeto para manejar la sesión del sistema
   * 
   * @var Session
   */
  private $session;

  /**
   * 
   * @param Config $config Objeto con la configuración del sistema
   * @param Session $session Objeto para manejar la sesión del sistema
   */
  public function __construct(Config $config, Session $session)
  {
    $this->config  = $config;
    $this->session = $session;
  }

  /**
   * Método para indicar el mensaje a usar del diccionario del idioma
   * establecido para el sistema
   * 
   * @param string $text
   * @param array|string $args
   * @return string
   */
  public function __(string $text, $args = null): string
  {
    $yaml = $this->LoadyamlCache();
    if (is_string($args) === true)
    {
      $answer = sprintf($yaml[$text], $args);
    }
    elseif (is_array($args) === true)
    {
      $answer = vsprintf($yaml[$text], $args);
    }
    else
    {
      $answer = $yaml[$text];
    }
    return $answer;
  }

  /**
   * Método para cargar el diccionario ya compilado o compila y cachea el
   * diccionario establecido para el sistema.
   * 
   * @return array
   */
  private function LoadyamlCache(): array
  {
    if ($this->session->has('i18n') === true and $this->session->get('i18n') === $this->config->getI18n())
    {
      $yaml = $this->session->get('i18n');
    }
    else
    {
      $yaml = yaml_parse_file($this->config->getPath() . 'i18n/' . $this->config->getI18n() . '.yml');
      $this->session->set('i18n', $yaml);
    }
    return $yaml;
  }

}

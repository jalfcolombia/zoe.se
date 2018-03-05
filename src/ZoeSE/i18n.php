<?php

namespace ZoeSE;

use ZoeSE\Config;
use ZoeSE\Session;

/**
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class i18n
{

  /**
   *
   * @var Config
   */
  private $config;

  /**
   *
   * @var Session
   */
  private $session;

  /**
   * 
   * @param Config $config
   * @param Session $session
   */
  public function __construct(Config $config, Session $session)
  {
    $this->config  = $config;
    $this->session = $session;
  }

  /**
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

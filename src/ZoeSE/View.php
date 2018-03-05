<?php

namespace ZoeSE;

/**
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class View
{

  /**
   *
   * @var array
   */
  private $params;

  /**
   *
   * @var string
   */
  private $view;

  /**
   *
   * @var Config
   */
  private $config;

  public function __construct(Config $config, string $view, $params = null)
  {
    $this->params = $params;
    $this->view   = $view;
    $this->config = $config;
  }

  public function render()
  {
    if (is_array($this->params) === true)
    {
      extract($this->params);
    }
    if (strpos($this->view, '/') === false)
    {
      require $this->config->getPath() . 'view/template.' . $this->view . '.php';
    }
    else
    {
      $this->view = str_replace('/', '/template.', $this->view);
      require $this->config->getPath() . 'view/' . $this->view . '.php';
    }
  }

}

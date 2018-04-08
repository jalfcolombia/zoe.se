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

/**
 * Clase para manejar la vista del sistema
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class View
{

  /**
   * Arreglo asociativo de variables que pasarán a la vista
   * 
   * @var array
   */
  private $params;

  /**
   * Nombre de la vista a utilizar
   * 
   * @var string
   */
  private $view;

  /**
   * Objeto con la configuración del sistema
   * 
   * @var Config
   */
  private $config;

  /**
   * Constructor de la clase View
   * 
   * @param Config $config Objeto con la configuración del sistema
   * @param string $view Nombre de la vista
   * @param array $params Arreglo con los vairables para la vista
   */
  public function __construct(Config $config, string $view, array $params = array())
  {
    $this->params = $params;
    $this->view   = $view;
    $this->config = $config;
  }

  public function render()
  {
    if (count($this->params) > 0) {
      extract($this->params);
    }

    if (strpos($this->view, '/') === false) {
      require $this->config->getPath() . 'view/template.' . $this->view . '.php';
    }
    else {
      $this->view = str_replace('/', '/template.', $this->view);
      require $this->config->getPath() . 'view/' . $this->view . '.php';
    }
  }

}

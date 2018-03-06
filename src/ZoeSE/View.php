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
 * Clase para manejar la vista del sistema
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class View
{

  /**
   * Arreglo con los parámetros (variables) que se usarán en la vista
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
   * Dirección fisica del proyecto en el servidor
   * 
   * @var string
   */
  private $path;

  /**
   * 
   * @param string $path Dirección fisica del proyecto en el servidor
   * @param string $view Nombre de la vista a utilizar
   * @param array $params Arreglo con los parámetros (variables) que se usarán en la vista
   */
  public function __construct(string $path, string $view, $params = array())
  {
    $this->params = $params;
    $this->view   = $view;
    $this->path   = $path;
  }

  /**
   * Método para renderizar la vista
   */
  public function render(): void
  {
    if (count($this->params) > 0)
    {
      extract($this->params);
    }
    if (strpos($this->view, '/') === false)
    {
      require $this->path . 'view/template.' . $this->view . '.php';
    }
    else
    {
      $this->view = str_replace('/', '/template.', $this->view);
      require $this->path . 'view/' . $this->view . '.php';
    }
  }

}

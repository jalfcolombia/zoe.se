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
 * Clase para manejar las sesiones del sistema
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class Session
{

  /**
   * Obtiene el objeto de la clase Session del paquete ZoeSE
   * 
   * @return Session
   */
  protected function getSession(): Session
  {
    return new Session();
  }

  /**
   * Obtiene el valor de la variable de sesión indicada
   * 
   * @param string $variable Nombre de la variable de sesión
   * @return mixed
   */
  public function get(string $variable)
  {
    return $_SESSION[$variable];
  }

  /**
   * Establece un valor para una variable de sesión
   * 
   * @param string $variable Nombre de la variable de sesión
   * @param mixed $value Valor para la variable de sesión
   * @return $this
   */
  public function set(string $variable, $value)
  {
    $_SESSION[$variable] = $value;
    return $this;
  }

  /**
   * Borra una variable de sesión
   * 
   * @param string $variable Nombre de la variable de sesión
   * @return $this
   */
  public function delete(string $variable)
  {
    unset($_SESSION[$variable]);
    return $this;
  }

  /**
   * Verifica la existencia de una variable de sesión
   * 
   * @param string $variable Nombre de la variable de sesión
   * @return bool
   */
  public function has(string $variable): bool
  {
    return isset($_SESSION[$variable]);
  }

}

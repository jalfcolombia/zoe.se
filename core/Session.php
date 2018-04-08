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
   * Devuelve el valor de una variable de sesión.
   * 
   * @param string $variable Nombre de la variable
   * @return mixed
   */
  public function Get(string $variable)
  {
    return $_SESSION[$variable];
  }

  /**
   * Establece el valor para una variable de sesión.
   * 
   * @param string $variable Nombre de la variable
   * @param mixed $value Valor de la variable
   */
  public function Set(string $variable, $value)
  {
    $_SESSION[$variable] = $value;
  }

  /**
   * Borra una variable de sesión.
   * 
   * @param string $variable Nombre de la variable
   */
  public function Delete(string $variable): void
  {
    unset($_SESSION[$variable]);
  }

  /**
   * Verifica la existencia de una variable de sesión.
   * 
   * @param string $variable Nombre de la variable
   * @return bool VERDADERO o FALSO si existe o no la variable indicada.
   */
  public function Has(string $variable): bool
  {
    return isset($_SESSION[$variable]);
  }

}

<?php

namespace ZoeSE;

/**
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class Session
{

  /**
   * 
   * @return Session
   */
  protected function getSession()
  {
    return new Session();
  }

  public function get(string $variable)
  {
    return $_SESSION[$variable];
  }

  public function set(string $variable, $value)
  {
    $_SESSION[$variable] = $value;
  }

  public function delete(string $variable)
  {
    unset($_SESSION[$variable]);
  }

  public function has(string $variable)
  {
    return isset($_SESSION[$variable]);
  }

}

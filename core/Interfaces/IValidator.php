<?php

namespace ZoeSE\Interfaces;

/**
 * Interfaz para los validadores personalizados
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
interface IValidator
{

  /**
   * Función principal para un validador personalizado
   * 
   * @param string $value
   * @param array $params
   * @return bool VERDADERO si cumple con la validación, FALSO si no cumple con la validación.
   */
  public function validate(string $value, array $params = array());

}

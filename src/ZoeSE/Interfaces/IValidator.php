<?php

/**
 * This file is part of the ZoeSE package.
 *
 * (c) Julian Lasso <jalasso69@misena.edu.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
   * @param string $value Valor principal a validar
   * @param array $params [opcional] Arreglo con parámetros adicionales para
   * la validación a realizar
   * @return bool VERDADERO si cumple con la validación, FALSO si no cumple
   * con la validación.
   */
  public function validate(string $value, array $params = array());

}

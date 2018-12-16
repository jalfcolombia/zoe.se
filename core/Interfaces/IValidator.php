<?php

/**
 * This file is part of the ZoeSE package.
 *
 * (c) Servicio Nacional de Aprendizaje - SENA
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP version 7
 *
 * @category Interfaces
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */

namespace ZoeSE\Interfaces;

/**
 * Interfaz para los validadores personalizados
 *
 * @category Interfaces
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */
interface IValidator
{

    /**
     * Función principal para un validador personalizado
     *
     * @param string $value Valor a válidar
     * @param array $params [opcional] Arreglo con parámetros
     *
     * @return bool VERDADERO si cumple con la validación, FALSO si no cumple con la validación.
     */
    public function validate(string $value, array $params = array());
}

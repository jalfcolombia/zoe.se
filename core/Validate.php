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
 * @category Validation
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */

namespace ZoeSE;

/**
 * Clase para realizar validaciones en formularios o similares
 *
 * @category Validation
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */
class Validate
{

    /**
     * Validación del tipo ¿el valor será numérico?
     */
    const IS_NUMBER = 0;

    /**
     * Validación del tipo ¿el valor principal será igual al valor secundario?
     */
    const IS_EQUAL = 1;

    /**
     * Validación del tipo ¿el valor principal no es igual al valor secundario?
     */
    const IS_NOT_EQUAL = 2;

    /**
     * Validación por medio de una expresión regular
     */
    const PATTERN = 3;

    /**
     * Validación de un correo electrónico
     */
    const IS_EMAIL = 4;

    /**
     * Validación del tipo ¿el valor princial es nulo?
     */
    const IS_NULL = 5;

    /**
     * Validación del tipo ¿el valor principal no será nulo?
     */
    const IS_NOT_NULL = 6;

    /**
     * Validación del tipo ¿el valor existe en base de datos?
     */
    const EXISTS_IN_DATABASE = 7;

    /**
     * Validación basada en un dato booleano VERDADERO
     */
    const BOOLEAN_TRUE = 8;

    /**
     * Validación basada en un dato booleano FALSO
     */
    const BOOLEAN_FALSE = 9;

    /**
     * Validación personalizada
     */
    const CUSTOM = 10;

    /**
     * Arreglo con la configuración para realizar las validaciones
     *
     * @var array
     */
    private $form;

    /**
     * Variable recolectora de los errores presentados para la configuración de validación
     *
     * @var array
     */
    private $error = array();

    /**
     * Clase para realizar validaciones en formularios o similares
     *
     * @param array $form Arreglo con la configuración para realizar las validaciones
     */
    public function __construct(array $form)
    {
        $this->form = $form;
    }

    /**
     * Obtiene el arreglo de errores
     *
     * @return array arreglo de errores
     */
    public function getErrors()
    {
        return $this->error;
    }

    /**
     * Establece un error a un input determinado
     *
     * @param string $input   Nombre del input
     * @param string $message Mensaje de error
     */
    public function setError(string $input, string $message)
    {
        $this->error[$input]['message'] = $message;
    }

    /**
     * Método principal para realizar la validación, el cual devolverá VERDADERO si la validación pasó totalmente
     * o de lo contrario, devolverá FALSO
     *
     * @return bool FALSO o VERDADERO si la validación no pasó o si pasó
     */
    public function isValid(): bool
    {
        $flagCnt = 0;
        foreach ($this->form as $input => $validations) {
            $cnt = count($validations) - 1;
            for ($x = 0; $x < $cnt; $x ++) {
                $flag = true;
                switch ($validations[$x]['type']) {
                    // IS_NUMBER
                    case 0:
                        if (is_numeric($validations['value']) === false) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // IS_EQUAL
                    case 1:
                        if (! ($validations['value'] == $validations[$x]['otherValue'])) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // IS_NOT_EQUAL
                    case 2:
                        if ($validations['value'] == $validations[$x]['otherValue']) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // PATTERN
                    case 3:
                        if (! preg_match($validations[$x]['pattern'], $validations['value'])) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // IS_EMAIL
                    case 4:
                        if (filter_var($validations['value'], FILTER_VALIDATE_EMAIL) === false) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // IS_NULL
                    case 5:
                        if (strlen($validations['value']) > 0) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // IS_NOT_NULL
                    case 6:
                        if (is_null($validations['value']) === true or $validations['value'] === '') {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // EXISTS_IN_DATABASE
                    case 7:
                        if ($validations[$x]['answer'] === true) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // BOOLEAN_TRUE
                    case 8:
                        if ($validations[$x]['answer'] === true) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // BOOLEAN_FALSE
                    case 9:
                        if ($validations[$x]['answer'] === false) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;

                    // CUSTOM
                    case 10:
                        if (isset($validations[$x]['files'])
                            and is_array($validations[$x]['files'])
                            and count($validations[$x]['files']) > 0
                        ) {
                            foreach ($validations[$x]['files'] as $file) {
                                if (is_file($file) === true) {
                                    require_once $file;
                                } else {
                                    throw new \Exception("El archivo '$file' no existe");
                                }
                            }
                        }
                        $class = new $validations[$x]['class']();
                        if ($class->Validate(
                            $validations['value'],
                            (isset($validations[$x]['params'])) ? $validations[$x]['params'] : array()
                        ) === false) {
                            $flag = false;
                            $flagCnt ++;
                        }
                        break;
                }
                if (! $flag) {
                    $this->setError($input, $validations[$x]['message']);
                    break;
                }
            }
        }
        return $flagCnt > 0 ? false : true;
    }
}

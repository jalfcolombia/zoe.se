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
 * @category Internationalization
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */

namespace ZoeSE;

use ZoeSE\Config;
use ZoeSE\Session;

/**
 * Clase para manejar la internacionalización de los mensajes en el sistema
 *
 * @category Internationalization
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */
class i18n
{

    /**
     * Objecto con la configuración del sistema
     *
     * @var Config
     */
    private $config;

    /**
     * Objeto para el manejo de las sesiones del sistema
     *
     * @var Session
     */
    private $session;

    /**
     * Constructor de la clase i18n
     *
     * @param Config $config   Objecto con la configuración del sistema
     * @param Session $session Objeto para el manejo de las sesiones del sistema
     */
    public function __construct(Config $config, Session $session)
    {
        $this->config = $config;
        $this->session = $session;
    }

    /**
     * Devuelve el mensaje indicado en el idioma configurado
     *
     * @param string $text Clave del mensaje
     * @param array|string [$args] Arreglo o cadena de caracteres que se usará en el mensaje devuelto
     *
     * @return string Mensaje indicado
     */
    public function __(string $text, $args): string
    {
        $yaml = $this->loadYamlCache();
        if (is_string($args) === true) {
            $answer = sprintf($yaml[$text], $args);
        } elseif (is_array($args) === true) {
            $answer = vsprintf($yaml[$text], $args);
        }
        return $answer;
    }

    /**
     * Devuelve arreglo con el diccionario de mensajes del sistema.
     * El método los carga del archivo YAML o de la sessión establecida
     *
     * @return array Arreglo con diccionario de mensajes del sistema
     */
    private function loadYamlCache(): array
    {
        if ($this->session->has('i18n') === true) {
            $yaml = $this->session->get('i18n');
        } else {
            $yaml = yaml_parse_file(
                $this->config->getPath() . 'i18n' . DIRECTORY_SEPARATOR . $this->config->getI18n() . '.yml'
            );
            $this->session->set('i18n', $yaml);
        }
        return $yaml;
    }
}

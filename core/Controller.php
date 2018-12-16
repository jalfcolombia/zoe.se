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
 * @category Controller
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */

namespace ZoeSE;

use ZoeSE\Config;
use ZoeSE\Session;
use ZoeSE\i18n;

/**
 * Clase para los controladores del sistema
 *
 * @category Controller
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */
abstract class Controller
{

    /**
     * Variable con objeto de configuración
     *
     * @access private
     * @var Config
     */
    private $config;

    /**
     * Array con las variables que pasan del controlador a la vista
     *
     * @access private
     * @var array
     */
    private $params;

    /**
     * Nombre de la vista a usar por el controlador
     *
     * @access private
     * @var string
     */
    private $view;

    /**
     * Objeto para el manejo de sesiones
     *
     * @access private
     * @var Session
     */
    private $session;

    /**
     * Objeto para manejar el idioma del sistema.
     *
     * @access private
     * @var i18n
     */
    private $i18n;

    /**
     * Metodo principal abstracto a implementar en los controladores del sistemas
     *
     * @param Request $request
     */
    abstract public function main(Request $request);

    /**
     * Constructor de la clase Controller.
     *
     * @param Config  $config  Instancia del objeto Config
     * @param Session $session Instancia del objeto Session
     * @param i18n    $i18n    Instancia del objeto i18n
     */
    public function __construct(Config $config, Session $session, i18n $i18n)
    {
        $this->config = $config;
        $this->session = $session;
        $this->i18n = $i18n;
        $this->params = array();
    }

    /**
     * Obtiene el objeto configurador del sistema.
     *
     * @return Config Instancia de la clase Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Obtiene un arreglo con los datos que pasarán a la vista.
     *
     * @return array Arreglo de datos
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Obtiene el nombre de la vista a usar.
     *
     * @return string Nombre de la vista
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Obtiene el objeto de para el manejo de las sesiones.
     *
     * @return Session Instancia de la clase Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Objeto para manejar el idioma y los mensajes del sistema.
     *
     * @return i18n Instancia de la clase i18n
     */
    public function i18n()
    {
        return $this->i18n;
    }

    /**
     * Establece una variable para ser pasada a la vista.
     *
     * @param string $param Nombre de la variable
     * @param mixed  $value Valor de la variable
     *
     * @return $this Instancia de la clase Controller
     */
    public function setParam(string $param, $value)
    {
        $this->params[$param] = $value;
        return $this;
    }

    /**
     * Establece la vista a usar por el controlador.
     *
     * @param string $view Nombre de la vista a usar
     *
     * @return $this Instancia de la clase Controller
     */
    public function setView(string $view)
    {
        $this->view = $view;
        return $this;
    }

    /**
     * Establece el código de respuesta HTTP para el navegador.
     *
     * @param int $code Código HTTP de respuesta
     *
     * @return $this Instancia de la clase Controller
     */
    public function setResponseCode(int $code)
    {
        http_response_code($code);
        return $this;
    }

    /**
     * Obtiene el codigo HTTP de respuesta.
     *
     * @return int Código HTTP
     */
    public function getResponseCode()
    {
        return http_response_code();
    }

    /**
     * Establece cabecera HTTP
     *
     * @param string $name  Nombre del parámetro
     * @param string $value Valor del parámetro
     */
    public function setHeader(string $name, string $value)
    {
        header("{$name}: {$value}");
    }

    /**
     * Obtiene el encabezado a enviar en la petición HTTP
     *
     * @return array Arreglo con las cabeceras HTTP a enviar
     */
    public function getHeader(): array
    {
        return headers_list();
    }
}

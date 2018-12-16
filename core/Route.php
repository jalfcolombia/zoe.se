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
 * @category Route
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */

namespace ZoeSE;

/**
 * Clase para manejar la ruta de una URL amigable.
 * La clase ha sido modificada ligeramente por Julian Lasso para el acondicionamiento en Zoe Student Edition
 *
 * @category Route
 * @package  ZoeSE
 * @author   Federico Guzman <federico@weblantropia.com>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     http://www.weblantropia.com/2016/07/28/enrutamiento-urls-htaccess-php/ Dirección origen de la clase
 */
class Route
{

    /**
     * Identificador uniforme de recursos
     *
     * @var string
     */
    private $uri;

    /**
     * Arreglo con los fragmentos de la ruta base
     *
     * @var array
     */
    private $routes;

    /**
     * Indicador de necesidad de solicitud de los parámetros provenientes por el método GET
     *
     * @var bool
     */
    private $get_params;

    /**
     * Constructor de la clase Route
     *
     * @param bool $get_params Indicador de la existencia de variables por el método GET
     */
    public function __construct(bool $get_params = false)
    {
        $this->get_params = $get_params;
    }

    /**
     * Obtiene el arreglo de rutas y variables entrantes por el método GET
     *
     * @return array Arreglo con los datos de la ruta solicitada
     */
    public function getRoutes(): array
    {
        $base_url = $this->getCurrentUri();
        $this->routes = explode('/', $base_url);
        
        $this->getParams(); // invocamos el nuevo método
        return $this->routes;
    }

    /**
     * Obtiene la dirección amigable después del .php
     *
     * @return string Cadena con el dirección amigable
     */
    private function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $this->uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        
        if ($this->get_params) {
            $this->getParams();
        } elseif (strstr($this->uri, '?')) {
            $this->uri = substr($this->uri, 0, strpos($this->uri, '?'));
        }
        
        $this->uri = '/' . trim($this->uri, '/');
        return $this->uri;
    }

    /**
     * Obtiene las variables que entran por el método GET
     */
    private function getParams()
    {
        if (strstr($this->uri, '?')) {
            $params = explode("?", $this->uri);
            $params = $params[1];
            
            parse_str($params, (array) $params_tmp);
            $this->routes[0] = $params_tmp;
            array_pop($this->routes);
        }
    }
}

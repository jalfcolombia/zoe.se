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
 * @category Response
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */

namespace ZoeSE;

use ZoeSE\Config;

/**
 * Clase para manejar la vista del sistema
 *
 * @category Response
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */
class View
{

    /**
     * Arreglo asociativo de variables que pasarán a la vista
     *
     * @var array
     */
    private $params;

    /**
     * Nombre de la vista a utilizar
     *
     * @var string
     */
    private $view;

    /**
     * Objeto con la configuración del sistema
     *
     * @var Config
     */
    private $config;

    /**
     * Constructor de la clase View
     *
     * @param Config $config Objeto con la configuración del sistema
     * @param string $view   Nombre de la vista
     * @param array $params  Arreglo con los vairables para la vista
     */
    public function __construct(Config $config, string $view, array $params = array())
    {
        $this->params = $params;
        $this->view = $view;
        $this->config = $config;
    }

    /**
     * Método renderizador de la vista
     */
    public function render()
    {
        if (count($this->params) > 0) {
            extract($this->params);
        }

        if (strpos($this->view, '/') === false) {
            require $this->config->getPath() . 'view' . DIRECTORY_SEPARATOR . 'template.' . $this->view . '.php';
        } else {
            $this->view = str_replace('/', DIRECTORY_SEPARATOR . 'template.', $this->view);
            require $this->config->getPath() . 'view' . DIRECTORY_SEPARATOR . $this->view . '.php';
        }
    }
}

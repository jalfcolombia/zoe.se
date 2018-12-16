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
 * @category Config
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */

namespace ZoeSE;

/**
 * Clase para controlar la configuración mínima necesaria
 *
 * @category Config
 * @package  ZoeSE
 * @author   Julian Lasso <jalasso69@misena.edu.co>
 * @license  https://github.com/jalfcolombia/zoe.se/blob/master/LICENSE MIT
 * @link     https://github.com/jalfcolombia/zoe.se
 */
class Config
{

    /**
     * Dirección física de donde se encuentra el proyecto en el servidor.
     *
     * @var string
     * @access private
     */
    private $path;

    /**
     * Controlador a usar para la conexión a la base de datos.
     * Ejemplo pgsql, mysql, sqlsvr
     *
     * @var string
     * @access private
     */
    private $driver;

    /**
     * Dirección IP de la base de datos.
     *
     * @var string
     * @access private
     */
    private $host;

    /**
     * Puerto de conexión de la base de datos.
     *
     * @var int
     * @access private
     */
    private $port;

    /**
     * Nombre de la base de datos a usar en el sistema.
     *
     * @var string
     * @access private
     */
    private $dbname;

    /**
     * Usuario de la base de datos.
     *
     * @var string
     * @access private
     */
    private $user;

    /**
     * Contraseña del usuario de la base de datos.
     *
     * @var string
     * @access private
     */
    private $password;

    /**
     * Método de encriptación. Ejemplo md5, sha1, sha256
     *
     * @var string
     * @access private
     * @link http://php.net/manual/en/function.hash.php
     */
    private $hash;

    /**
     * Dirección web del proyecto.
     *
     * @var string
     * @access private
     */
    private $url;

    /**
     * Idioma a usar en el sistema.
     * Ejemplo es, en
     *
     * @var string
     * @access private
     */
    private $i18n;

    /**
     * Obtiene la dirección física del proyecto en el servidor web.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Obtiene el controlador de base de datos configurado.
     *
     * @return string
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Obtiene la dirección IP de la base de datos configurada.
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Obtiene el puerto de conexión de la base de datos.
     *
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Obtiene el nombre de la base de datos.
     *
     * @return string
     */
    public function getDbName()
    {
        return $this->dbname;
    }

    /**
     * Obtiene el nombre de usuario de la base de datos.
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Obtiene la contraseña del usuario de la base de datos.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Obtiene el método de encriptación configurado.
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Obtiene la direción URL del proyecto.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Obtiene el idioma configurado para el sistema.
     *
     * @return string
     */
    public function getI18n()
    {
        return $this->i18n;
    }

    /**
     * Establece la dirección física del proyecto en el servidor web.
     *
     * @param string $path Direccón física del proyecto
     *
     * @return $this Instancia de la clase Config
     */
    public function setPath(string $path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Establece el nombre del controlador de la base de datos a utlizar.
     *
     * @param string $driver Nombre del controlador
     *
     * @return $this Instancia de la clase Config
     */
    public function setDriver(string $driver)
    {
        $this->driver = $driver;
        return $this;
    }

    /**
     * Establece la dirección IP o nombre del HOST de la base de datos
     *
     * @param string $host Nombre del HOST o dirección IP
     *
     * @return $this Instancia de la clase Config
     */
    public function setHost(string $host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Establece el puerto de conexión a la base de datos.
     *
     * @param int $port Número del puerto de conexión
     *
     * @return $this Instancia de la clase Config
     */
    public function setPort(int $port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * Establece el nombre de la base de datos.
     *
     * @param string $dbname Nombre de la base de datos
     *
     * @return $this Instancia de la clase Config
     */
    public function setDbName(string $dbname)
    {
        $this->dbname = $dbname;
        return $this;
    }

    /**
     * Establece el usuario de la base de datos.
     *
     * @param string $user Nombre de usuario
     *
     * @return $this Instancia de la clase Config
     */
    public function setUser(string $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Establece la contraseña del usuario de la base de datos.
     *
     * @param string $password Contraseña de usuario de la base de datos
     *
     * @return $this Instancia de la clase Config
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Establece el método de encriptación a usar en el sistema.
     *
     * @param string $hash Método de encriptación
     *
     * @return $this Instancia de la clase Config
     */
    public function setHash(string $hash)
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * Establece la dirección URL del proyecto.
     *
     * @param string $url URL del proyecto
     *
     * @return $this Instancia de la clase Config
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Establece el idioma a usar en el sistema.
     *
     * @param string $i18n Idioma a usar en el sistema
     *
     * @return $this Instancia de la clase Config
     */
    public function setI18n(string $i18n)
    {
        $this->i18n = $i18n;
        return $this;
    }
}

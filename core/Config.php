<?php

/**
 * This file is part of the ZoeSE package.
 *
 * (c) Julian Lasso <jalasso69@misena.edu.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ZoeSE;

/**
 * Clase para controlar la configuración mínima necesaria
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
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
   * Controlador a usar para la conexión a la base de datos.<br>
   * Ejemplo pgsql, mysql
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
   * Método de encriptación. Ejemplo md5.
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
   * Idioma a usar en el sistema. Ejemplo es, en
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
  public function GetPath()
  {
    return $this->path;
  }

  /**
   * Obtiene el controlador de base de datos configurado.
   * 
   * @return string
   */
  public function GetDriver()
  {
    return $this->driver;
  }

  /**
   * Obtiene la dirección IP de la base de datos configurada.
   * 
   * @return string
   */
  public function GetHost()
  {
    return $this->host;
  }

  /**
   * Obtiene el puerto de conexión de la base de datos.
   * 
   * @return int
   */
  public function GetPort()
  {
    return $this->port;
  }

  /**
   * Obtiene el nombre de la base de datos.
   * 
   * @return string
   */
  public function GetDbName()
  {
    return $this->dbname;
  }

  /**
   * Obtiene el nombre de usuario de la base de datos.
   * 
   * @return string
   */
  public function GetUser()
  {
    return $this->user;
  }

  /**
   * Obtiene la contraseña del usuario de la base de datos.
   * 
   * @return srting
   */
  public function GetPassword()
  {
    return $this->password;
  }

  /**
   * Obtiene el método de encriptación configurado.
   * 
   * @return srting
   */
  public function GetHash()
  {
    return $this->hash;
  }

  /**
   * Obtiene la direción URL del proyecto.
   * 
   * @return string
   */
  public function GetUrl()
  {
    return $this->url;
  }

  /**
   * Obtiene el idioma configurado para el sistema.
   * 
   * @return string
   */
  public function GetI18n()
  {
    return $this->i18n;
  }

  /**
   * Establece la dirección física del proyecto en el servidor web.
   * 
   * @param string $path
   * @return $this
   */
  public function SetPath(string $path)
  {
    $this->path = $path;
    return $this;
  }

  /**
   * Establece la dirección IP de la base de datos.
   * 
   * @param string $driver
   * @return $this
   */
  public function SetDriver(string $driver)
  {
    $this->driver = $driver;
    return $this;
  }

  /**
   * Establece la dirección IP de la base de datos
   * 
   * @param string $host
   * @return $this
   */
  public function SetHost(string $host)
  {
    $this->host = $host;
    return $this;
  }

  /**
   * Establece el puerto de conexión a la base de datos.
   * 
   * @param int $port
   * @return $this
   */
  public function SetPort(int $port)
  {
    $this->port = $port;
    return $this;
  }

  /**
   * Establece el nombre de la base de datos.
   * 
   * @param string $dbname
   * @return $this
   */
  public function SetDbName(string $dbname)
  {
    $this->dbname = $dbname;
    return $this;
  }

  /**
   * Establece el usuario de la base de datos.
   * 
   * @param string $user
   * @return $this
   */
  public function SetUser(string $user)
  {
    $this->user = $user;
    return $this;
  }

  /**
   * Establece la contraseña del usuario de la base de datos.
   * 
   * @param string $password
   * @return $this
   */
  public function SetPassword(string $password)
  {
    $this->password = $password;
    return $this;
  }

  /**
   * Establece el método de encriptación a usar en el sistema.
   * 
   * @param string $hash
   * @return $this
   */
  public function SetHash(string $hash)
  {
    $this->hash = $hash;
    return $this;
  }

  /**
   * Establece la dirección URL del proyecto.
   * 
   * @param string $url
   * @return $this
   */
  public function SetUrl(string $url)
  {
    $this->url = $url;
    return $this;
  }

  /**
   * Establece el idioma a usar en el sistema.
   * 
   * @param string $i18n
   * @return $this
   */
  public function SetI18n(string $i18n)
  {
    $this->i18n = $i18n;
    return $this;
  }

}

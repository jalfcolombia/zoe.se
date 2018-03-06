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
 * Clase para llevar la configuración necesaria por Zoe
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class Config
{

  /**
   * Dirección de la ubicación del proyecto
   * 
   * @var string 
   * @access private
   */
  private $path;

  /**
   * Controlador a usar con la librería PDO
   * 
   * @var string 
   * @access private
   */
  private $drive;

  /**
   * Host donde se encuentra la base de datos
   * 
   * @var string 
   * @access private
   */
  private $host;

  /**
   * Puerto de conexión a la base de datos
   * 
   * @var int 
   * @access private
   */
  private $port;

  /**
   * Nombre de la base de datos
   * 
   * @var string 
   * @access private
   */
  private $dbname;

  /**
   * Usuario de la base de datos
   * 
   * @var string 
   * @access private
   */
  private $user;

  /**
   * Contraseña de la base de datos
   * 
   * @var string 
   * @access private
   */
  private $password;

  /**
   * Hash a usar para encripar información
   * 
   * @var string 
   * @access private
   */
  private $hash;

  /**
   * Dirección del proyecto para ejecutar en el navegador
   * 
   * @var string 
   * @access private
   */
  private $url;

  /**
   * Idioma establecido para el sistema
   * 
   * @var string
   * @access private
   */
  private $i18n;

  /**
   * Devuelve la ruta en la que se encuntra el proyecto
   * 
   * @return string
   */
  public function getPath(): string
  {
    return $this->path;
  }

  /**
   * Devuelve el controlador establecido para la base de datos
   * 
   * @return string
   */
  public function getDrive(): string
  {
    return $this->drive;
  }

  /**
   * Devuelve la dirección IP del host de la base de datos (la ubicación)
   * 
   * @return string
   */
  public function getHost(): string
  {
    return $this->host;
  }

  /**
   * Devuelve el puerto de conexión usado para la base de datos
   * 
   * @return int
   */
  public function getPort(): int
  {
    return $this->port;
  }

  /**
   * Devuelve el nombre de la base de datos establecida para el sistma
   * 
   * @return string
   */
  public function getDbname(): string
  {
    return $this->dbname;
  }

  /**
   * Devuelve el nombre de usuario utilizado en la base de datos
   * 
   * @return string
   */
  public function getUser(): string
  {
    return $this->user;
  }

  /**
   * Devuelve la contraseña utilizada en la base de datos
   * 
   * @return string
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * Devuelve el hash a utilizar por el sistema para relizar encriptaciones
   * 
   * @return string
   */
  public function getHash(): string
  {
    return $this->hash;
  }

  /**
   * Devuelve la URL a usar por el sistema
   * 
   * @return string
   */
  public function getUrl(): string
  {
    return $this->url;
  }

  /**
   * Devuelve el idioma establecido por defecto para el sistma
   * 
   * @return string
   */
  public function getI18n(): string
  {
    return $this->i18n;
  }

  /**
   * Establece la ubicación física del proyecto
   * 
   * @param string $path Ubicación física del proyecto
   * @return $this
   */
  public function setPath(string $path): Config
  {
    $this->path = $path;
    return $this;
  }

  /**
   * Establece el controlador a utilizar por PDO para la conexión
   * a la base de datos
   * 
   * @param string $drive Controlador PDO
   * @return $this
   */
  public function setDrive(string $drive): Config
  {
    $this->drive = $drive;
    return $this;
  }

  /**
   * Establece el host (dirección IP) donde se encuentra la base de datos
   * 
   * @param string $host Dirección IP
   * @return $this
   */
  public function setHost(string $host): Config
  {
    $this->host = $host;
    return $this;
  }

  /**
   * Establece el puerto de conexión para la base de datos
   * 
   * @param int $port Puerto de conexión en la base de datos
   * @return $this
   */
  public function setPort(int $port): Config
  {
    $this->port = $port;
    return $this;
  }

  /**
   * Establece el nombre de la base de datos a usar por el sistema
   * 
   * @param string $dbname Nombre de la base de datos
   * @return $this
   */
  public function setDbname(string $dbname): Config
  {
    $this->dbname = $dbname;
    return $this;
  }

  /**
   * Establece el usuario para conectarse a la base de datos
   * 
   * @param string $user Usuario de la base de datos
   * @return $this
   */
  public function setUser(string $user): Config
  {
    $this->user = $user;
    return $this;
  }

  /**
   * Establece la contraseña del usuario de la base de datos
   * 
   * @param string $password Contraseña del usuario de la base de datos
   * @return $this
   */
  public function setPassword(string $password): Config
  {
    $this->password = $password;
    return $this;
  }

  /**
   * Establece el hash a utilizar por el sistema para encriptar información
   * 
   * @param string $hash Método de encriptación
   * @return $this
   */
  public function setHash(string $hash): Config
  {
    $this->hash = $hash;
    return $this;
  }

  /**
   * Establece la URL del proyecto
   * 
   * @param string $url URL del proyecto
   * @return $this
   */
  public function setUrl(string $url): Config
  {
    $this->url = $url;
    return $this;
  }

  /**
   * Establece el idioma a usar por el sistema
   * 
   * @param string $i18n Idioma a usar
   * @return $this
   */
  public function setI18n(string $i18n): Config
  {
    $this->i18n = $i18n;
    return $this;
  }

}

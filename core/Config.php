<?php

namespace ZoeSE;

/**
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class Config
{

  /**
   *
   * @var string 
   * @access private
   */
  private $path;

  /**
   *
   * @var string 
   * @access private
   */
  private $drive;

  /**
   *
   * @var string 
   * @access private
   */
  private $host;

  /**
   *
   * @var int 
   * @access private
   */
  private $port;

  /**
   *
   * @var string 
   * @access private
   */
  private $dbname;

  /**
   *
   * @var string 
   * @access private
   */
  private $user;

  /**
   *
   * @var string 
   * @access private
   */
  private $password;

  /**
   *
   * @var string 
   * @access private
   */
  private $hash;

  /**
   *
   * @var string 
   * @access private
   */
  private $url;

  /**
   *
   * @var string
   * @access private
   */
  private $i18n;

  public function getPath()
  {
    return $this->path;
  }

  public function getDrive()
  {
    return $this->drive;
  }

  public function getHost()
  {
    return $this->host;
  }

  public function getPort()
  {
    return $this->port;
  }

  public function getDbname()
  {
    return $this->dbname;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getHash()
  {
    return $this->hash;
  }

  public function getUrl()
  {
    return $this->url;
  }

  public function getI18n()
  {
    return $this->i18n;
  }

  /**
   * 
   * @param string $path
   * @return $this
   */
  public function setPath(string $path)
  {
    $this->path = $path;
    return $this;
  }

  /**
   * 
   * @param string $drive
   * @return $this
   */
  public function setDrive(string $drive)
  {
    $this->drive = $drive;
    return $this;
  }

  /**
   * 
   * @param string $host
   * @return $this
   */
  public function setHost(string $host)
  {
    $this->host = $host;
    return $this;
  }

  /**
   * 
   * @param int $port
   * @return $this
   */
  public function setPort(int $port)
  {
    $this->port = $port;
    return $this;
  }

  /**
   * 
   * @param string $dbname
   * @return $this
   */
  public function setDbname(string $dbname)
  {
    $this->dbname = $dbname;
    return $this;
  }

  /**
   * 
   * @param string $user
   * @return $this
   */
  public function setUser(string $user)
  {
    $this->user = $user;
    return $this;
  }

  /**
   * 
   * @param string $password
   * @return $this
   */
  public function setPassword(string $password)
  {
    $this->password = $password;
    return $this;
  }

  /**
   * 
   * @param string $hash
   * @return $this
   */
  public function setHash(string $hash)
  {
    $this->hash = $hash;
    return $this;
  }

  /**
   * 
   * @param string $url
   * @return $this
   */
  public function setUrl(string $url)
  {
    $this->url = $url;
    return $this;
  }

  /**
   * 
   * @param string $i18n
   * @return $this
   */
  public function setI18n(string $i18n)
  {
    $this->i18n = $i18n;
    return $this;
  }

}

<?php

namespace ZoeSE;

/**
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class Request
{

  /**
   *
   * @var array
   */
  private $get;

  /**
   *
   * @var array
   */
  private $post;

  /**
   *
   * @var array
   */
  private $cookie;

  /**
   *
   * @var array
   */
  private $files;

  /**
   * @var array
   */
  private $put;

  /**
   * @var array
   */
  private $delete;

  /**
   * 
   * @param array $get
   * @param array $post
   * @param array $put
   * @param array $delete
   * @param array $cookie
   * @param array $files
   */
  public function __construct(array $get, array $post, array $put, array $delete, array $cookie, array $files)
  {
    $this->get    = $get;
    $this->post   = $post;
    $this->put    = $put;
    $this->delete = $delete;
    $this->files  = $files;
    $this->cookie = $cookie;
  }
  
  public function getPut(string $variable)
  {
    return isset($this->put[$variable]) ? htmlspecialchars($this->put[$variable]) : null;
  }
  
  public function hasPut(string $variable): bool
  {
    return isset($this->put[$variable]);
  }
  
  public function getDelete(string $variable)
  {
    return isset($this->delete[$variable]) ? htmlspecialchars($this->delete[$variable]) : null;
  }
  
  public function hasDelete(string $variable): bool
  {
    return isset($this->delete[$variable]);
  }

  /**
   * Obtiene variable enviada por el método GET
   * 
   * @param string $variable
   * @return string|null
   */
  public function getQuery(string $variable)
  {
    return isset($this->get[$variable]) ? htmlspecialchars($this->get[$variable]) : null;
  }

  /**
   * Comprueba la existencia de una variable envíada por el método GET
   * 
   * @param string $variable
   * @return bool
   */
  public function hasQuery(string $variable): bool
  {
    return isset($this->get[$variable]);
  }

  /**
   * Obtiene variable eviada por el método POST
   * 
   * @param string $variable
   * @return string|null
   */
  public function getParam(string $variable)
  {
    return isset($this->post[$variable]) ? htmlspecialchars($this->post[$variable]) : null;
  }

  /**
   * Comprueba la existencia de una variable envíada por el método POST
   * 
   * @param string $variable
   * @return bool
   */
  public function hasParam(string $variable): bool
  {
    return isset($this->post[$variable]);
  }

  /**
   * 
   * 
   * @param string $cookie
   * @return array
   */
  public function getCookie(string $cookie): array
  {
    return $this->cookie[$cookie];
  }

  /**
   * Obtiene un array con la información del archivo subido al servidor
   * 
   * @param string $file Nombre de la variable que identifica el archivo en el servidor
   * @return array
   */
  public function getFile(string $file): array
  {
    return $this->files[$file];
  }

  /**
   * 
   * @param string $file
   * @return bool
   */
  public function hasFile(string $file): bool
  {
    return isset($this->files[$file]);
  }

}

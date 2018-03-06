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
 * Clase para manejar las peticiones realizadas al sistema
 * 
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class Request
{

  /**
   * Arreglo con las variables enviadas por el método GET
   * 
   * @var array
   */
  private $get;

  /**
   * Arreglo con las variables enviadas por el método POST
   * 
   * @var array
   */
  private $post;

  /**
   * Arreglo con las cookies que se manejan en el sistema
   * 
   * @var array
   */
  private $cookie;

  /**
   * Arreglo con los archivos enviados al sistema
   * 
   * @var array
   */
  private $files;

  /**
   * Arreglo con las variables enviadas por el método PUT
   * 
   * @var array
   */
  private $put;

  /**
   * Arreglo con las variables enviadas por el método DELETE
   * 
   * @var array
   */
  private $delete;

  /**
   * 
   * @param array $get Arreglo con las variables enviadas por el método GET
   * @param array $post Arreglo con las variables enviadas por el método POST
   * @param array $put Arreglo con las variables enviadas por el método PUT
   * @param array $delete Arreglo con las variables enviadas por el método DELETE
   * @param array $cookie Arreglo con las cookies que se manejan en el sistema
   * @param array $files Arreglo con los archivos enviados al sistema
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
  
  /**
   * Devuelve el valor del parámetro indicado por el método PUT
   * 
   * @param string $variable Nombre de variable
   * @return mixed
   */
  public function getPut(string $variable)
  {
    return isset($this->put[$variable]) ? htmlspecialchars($this->put[$variable]) : null;
  }
  
  /**
   * Comprueba la existencia de una variable envíada por el método PUT
   * 
   * @param string $variable Nombre de variable
   * @return bool
   */
  public function hasPut(string $variable): bool
  {
    return isset($this->put[$variable]);
  }
  
  /**
   * Devuelve el valor del parámetro indicado por el método DELETE
   * 
   * @param string $variable Nombre de variable
   * @return type
   */
  public function getDelete(string $variable)
  {
    return isset($this->delete[$variable]) ? htmlspecialchars($this->delete[$variable]) : null;
  }
  
  /**
   * Comprueba la existencia de una variable envíada por el método DELETE
   * 
   * @param string $variable Nombre de variable
   * @return bool
   */
  public function hasDelete(string $variable): bool
  {
    return isset($this->delete[$variable]);
  }

  /**
   * Obtiene el valor de la variable establecida por el método GET
   * 
   * @param string $variable Nombre de Variable
   * @return string|null
   */
  public function getQuery(string $variable)
  {
    return isset($this->get[$variable]) ? htmlspecialchars($this->get[$variable]) : null;
  }

  /**
   * Comprueba la existencia de una variable envíada por el método GET
   * 
   * @param string $variable Nombre de variable
   * @return bool
   */
  public function hasQuery(string $variable): bool
  {
    return isset($this->get[$variable]);
  }

  /**
   * Obtiene variable eviada por el método POST
   * 
   * @param string $variable Nombre de variable
   * @return string|null
   */
  public function getParam(string $variable)
  {
    return isset($this->post[$variable]) ? htmlspecialchars($this->post[$variable]) : null;
  }

  /**
   * Comprueba la existencia de una variable envíada por el método POST
   * 
   * @param string $variable Nombre de variable
   * @return bool
   */
  public function hasParam(string $variable): bool
  {
    return isset($this->post[$variable]);
  }

  /**
   * Obtiene la información en un array de la cookie indicada
   * 
   * @param string $cookie Nombre de la cookie
   * @return array
   */
  public function getCookie(string $cookie): array
  {
    return $this->cookie[$cookie];
  }

  /**
   * Obtiene un array con la información del archivo subido al servidor
   * 
   * @param string $file Nombre de la variable del archivo
   * @return array
   */
  public function getFile(string $file): array
  {
    return $this->files[$file];
  }

  /**
   * Comprueba la existencia de un archivo envíado al servidor
   * 
   * @param string $file Nombre de la variable del archivo
   * @return bool
   */
  public function hasFile(string $file): bool
  {
    return isset($this->files[$file]);
  }

}

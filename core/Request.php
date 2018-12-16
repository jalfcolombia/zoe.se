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
 * Clase para controlar las peticiones realizadas al sistema.
 *
 * @author Julián Andrés Lasso Figueroa <jalasso69@misena.edu.co>
 */
class Request
{

    /**
     * Arreglo de variables en peticiones GET
     *
     * @var array
     */
    private $get;

    /**
     * Arreglo de variables en peticiones POST
     *
     * @var array
     */
    private $post;

    /**
     * Arreglo de COOKIES
     *
     * @var array
     */
    private $cookie;

    /**
     * Arreglo de archivos
     *
     * @var array
     */
    private $files;

    /**
     * Arreglo de variables en peticiones PUT
     *
     * @var array
     */
    private $put;

    /**
     * Arreglo de variables en peticiones DELETE
     *
     * @var array
     */
    private $delete;

    /**
     * Constructor de la clase Request
     *
     * @param array $get
     *            Arreglo con variables por método GET
     * @param array $post
     *            Arreglo con variables por método POST
     * @param array $put
     *            Arreglo con variables por método PUT
     * @param array $delete
     *            Arreglo con variables por método DELETE
     * @param array $cookie
     *            Arreglo con cookies
     * @param array $files
     *            Arreglo con archivos en la petción al servidor
     */
    public function __construct(array $get, array $post, array $put, array $delete, array $cookie, array $files)
    {
        $this->get = $get;
        $this->post = $post;
        $this->put = $put;
        $this->delete = $delete;
        $this->files = $files;
        $this->cookie = $cookie;
    }

    /**
     * Obtiene el valor de una variable por el método PUT
     *
     * @param string $variable
     *            Nombre de la variable
     * @return string | null Valor de la variable o NULL
     */
    public function getPut(string $variable)
    {
        return isset($this->put[$variable]) ? htmlspecialchars($this->put[$variable]) : null;
    }

    /**
     * Verifica la existencia de una variable por el método PUT
     *
     * @param string $variable
     *            Nombre de la variable
     * @return bool VERDADERO o FALSO si existe o no el valor indicado.
     */
    public function hasPut(string $variable): bool
    {
        return isset($this->put[$variable]);
    }

    /**
     * Obtiene el valor de una variable por el método DELETE
     *
     * @param string $variable
     *            Nombre de la variable
     * @return string | null Valor de la variable o NULL
     */
    public function getDelete(string $variable)
    {
        return isset($this->delete[$variable]) ? htmlspecialchars($this->delete[$variable]) : null;
    }

    /**
     * Verifica la existencia de una variable por el método DELETE
     *
     * @param string $variable
     *            Nombre de la variable
     * @return bool VERDADERO o FALSO si existe o no el valor indicado.
     */
    public function hasDelete(string $variable): bool
    {
        return isset($this->delete[$variable]);
    }

    /**
     * Obtiene el valor de una variable enviada por el método GET
     *
     * @param string $variable
     *            Nombre de la variable
     * @return string | null Valor de la variable o NULL
     */
    public function getQuery(string $variable)
    {
        return isset($this->get[$variable]) ? htmlspecialchars($this->get[$variable]) : null;
    }

    /**
     * Comprueba la existencia de una variable envíada por el método GET
     *
     * @param string $variable
     *            Nombre de la variable
     * @return bool VERDADERO o FALSO si existe o no el valor indicado.
     */
    public function hasQuery(string $variable): bool
    {
        return isset($this->get[$variable]);
    }

    /**
     * Obtiene el valor de una variable eviada por el método POST
     *
     * @param string $variable
     *            Nombre de la variable
     * @return string | null Valor de la variable o NULL
     */
    public function getParam(string $variable)
    {
        return isset($this->post[$variable]) ? htmlspecialchars($this->post[$variable]) : null;
    }

    /**
     * Comprueba la existencia de una variable envíada por el método POST
     *
     * @param string $variable
     *            Nombre de la variable
     * @return bool VERDADERO o FALSO si existe o no el valor indicado.
     */
    public function hasParam(string $variable): bool
    {
        return isset($this->post[$variable]);
    }

    /**
     * Obtiene el arreglo de la cookie indicada.
     *
     * @param string $cookie
     *            Nombre de la cookie
     * @return array Arreglo con los detalles de la cookie indicada.
     */
    public function getCookie(string $cookie): array
    {
        return $this->cookie[$cookie];
    }

    /**
     * Comprueba la existencia de una cookie
     *
     * @param string $cookie
     *            Nombre de la cookie
     * @return bool VERDADERO o FALSO si existe o no la cookie indicado.
     */
    public function hasCookie(string $cookie): bool
    {
        return isset($this->cookie[$cookie]);
    }

    /**
     * Obtiene un arreglo con la información del archivo subido al servidor
     *
     * @param string $file
     *            Nombre de la variable que identifica el archivo en el servidor
     * @return array Arreglo con los datos del archivo indicado
     */
    public function getFile(string $file): array
    {
        return $this->files[$file];
    }

    /**
     * Comprueba la existencia de un archivo subido al servidor
     *
     * @param string $file
     *            Nombre del archivo
     * @return bool VERDADERO o FALSO si existe o no la archivo indicado.
     */
    public function hasFile(string $file): bool
    {
        return isset($this->files[$file]);
    }
}

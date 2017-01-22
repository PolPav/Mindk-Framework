<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 22.09.2016
 * Time: 13:59
 */

namespace PolPav;


class Request
{
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

<<<<<<< HEAD
    
    /**
    * Get method
    * 
    *@return string
=======

    /**
    * Get method
    * 
    * @return string
>>>>>>> a1353fa76551a053289d08e68140657587608b52
    */
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get uri
     * 
<<<<<<< HEAD
     *@return string
=======
     * @return string
>>>>>>> a1353fa76551a053289d08e68140657587608b52
     */

    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * Get client IP
     * 
<<<<<<< HEAD
     *@return string
=======
     * @return string
>>>>>>> a1353fa76551a053289d08e68140657587608b52
     */

    public function getIP()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Get script name
     * 
<<<<<<< HEAD
     *@return string
=======
     * @return string
>>>>>>> a1353fa76551a053289d08e68140657587608b52
     */

    public function getScriptName()
    {
        return $_SERVER['SCRIPT_NAME'];
    }

    /**
     * is put request
     * 
<<<<<<< HEAD
     *@return bool
=======
     * @return bool
>>>>>>> a1353fa76551a053289d08e68140657587608b52
     */

    public function isPut()
    {
        return $this->getMethod() == self::METHOD_PUT;
    }

    /**
     * is delete request
     * 
<<<<<<< HEAD
     *@return bool
=======
     * @return bool
>>>>>>> a1353fa76551a053289d08e68140657587608b52
     */

    public function isDelete()
    {
        return $this->getMethod() == self::METHOD_DELETE;
    }

    /**
     * this method return string for request by GET, if parameter true return request with parameter
     * 
     * @param $id
<<<<<<< HEAD
     *@return array
=======
     * @return array
>>>>>>> a1353fa76551a053289d08e68140657587608b52
     */

    public function get($id = null)
    {
        $key = key($_GET);
<<<<<<< HEAD
        preg_match('/\/([a-z0-9]*)(\/?)([a-z0-9]*)(\/?)([a-z0-9]*)(\/?)([a-z0-9]*)/', $key, $pattern);
        $route = '/'.$pattern[3];
        if($pattern[5] !=  null) {
            $route = '/'.$pattern[3].'/'.$pattern[5];
        }
        if($pattern[7] != null) {
            $route = '/'.$pattern[3].'/'.$pattern[5].'/'.$pattern[7];
        }
        if($id == $pattern[3] or $id == $pattern[5] or $id == $pattern[7]){
            return $_GET[$id];
        }
=======
        preg_match('/\/([a-z0-9]+)(\/?)([a-z0-9]+)(\/?)([a-z0-9]*)/', $key, $pattern);
        $route = '/'.$pattern[3];
        if($pattern[5]!= null) {
            $route = '/' . $pattern[3] . '/' . $pattern[5];
            $_GET[$id] = $pattern[5];
        }
>>>>>>> a1353fa76551a053289d08e68140657587608b52
        return $route;
    }

    /**
     * this method return string for request by POST, if parameter true return request with parameter
     * 
     * @param $id
<<<<<<< HEAD
     *@return array
=======
     * @return array
>>>>>>> a1353fa76551a053289d08e68140657587608b52
     */

    public function post($id = null)
    {
        if($id != null){
            return $_POST[$id];
        }else{
            return $_POST;
        }
    }

    /**
<<<<<<< HEAD
     * this method return string for request by PUT, if parameter true return request with parameter
     * 
     * @param $id
     *@return array
=======
     * fetch data for request by PUT
     * 
     * @param $id
     * @return array
>>>>>>> a1353fa76551a053289d08e68140657587608b52
     */

    public function put($id = null)
    {
        if($this->isPut()){
            return $this->post($id);
        }
            return null;
    }

    /**
<<<<<<< HEAD
     * this method return string for request by DELETE, if parameter true return request with parameter
     * 
     * @param $id
     *@return array
=======
     * fetch data for request by DELETE
     * 
     * @param $id
     * @return array
>>>>>>> a1353fa76551a053289d08e68140657587608b52
     */

    public function delete($id = null)
    {
        if($this->isDelete()){
            return $this->post($id);
        }
            return null;
    }
}

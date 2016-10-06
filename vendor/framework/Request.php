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

    public function get($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $key = key($_GET);
            preg_match('/\/([a-z0-9]+)(\/?)([a-z0-9]+)(\/?)([a-z0-9]*)/', $key, $pattern);
            $route = '/'.$pattern[3];
            if($pattern[5]!= null) {
                $route = '/' . $pattern[3] . '/' . $pattern[5];
                $_GET[$id] = $pattern[5];
            }
                return $route;
        }
            return null;
   }

    public function post($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $id == null){
            return $_POST;
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $id != null){
            return $_POST[$id];
        } 
            return null;
    }

    public function put($id = null)
    {
        return $this->post($id);
    }

    public function delete($id = null)
    {
        return $this->post($id);
    }
   
}
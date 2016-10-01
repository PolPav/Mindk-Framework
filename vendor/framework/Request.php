<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 22.09.2016
 * Time: 13:59
 */

namespace polpav\framework;


class Request
{

    public function get($key = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $key == null){
                return $_GET;
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && $key != null){
            //    var_dump($_GET[$key]);
                return $_GET[$key];
        } else {return null;}
    }

    public function post($key = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $key == null){
            return $_POST;
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $key != null){
           // var_dump($_POST[$key]);
                return $_POST[$key];
        } else {return null;}
    }

    public function put($key = null)
    {
        return $this->post($key);
    }

    public function delete($key = null)
    {
        return $this->post($key);
    }



    public function containerShow(){
       // var_dump($_REQUEST);
       // var_dump($_GET['name']);
       // var_dump($_POST);
       // var_dump($_GET);

    }
}
<?php

/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 26.08.2016
 * Time: 14:39
 */
namespace polpav\framework\db;


class AdapterMysql implements AdapterDB
{
    private $db;


    function  __construct($config){
            $this->db = new \mysqli ($config['db']);
    }


    function query($sql){
       return $this->db->query($sql);
    }

    function fetch($result, $array_type){
        switch ($array_type){
            case 'index': return $result->fetch_array(MYSQLI_NUM);
                break;
            case 'assoc': return $result->fetch_array(MYSQLI_ASSOC);
                break;
            case 'both': return $result->fetch_array(MYSQLI_BOTH);
                break;
            default : return $this->db->error;

        }
    }
    function close()
    {
       return $this->db->close();
    }


}

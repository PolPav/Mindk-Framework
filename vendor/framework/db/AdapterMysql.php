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
        $this->db->query($sql);
        if($this->db->error){
            echo $this->db->error;
        }
    }

    function fetch($result, $array_type){
        switch ($array_type){
            case 'index':$this->db->$result->fetch_array(MYSQLI_NUM);
                break;
            case 'assoc': $this->db->$result->fetch_array(MYSQLI_ASSOC);
                break;
            case 'both': $this->db->$result->fetch_array(MYSQLI_BOTH);
                break;
            default : echo $result->$this->db->error;

        }
    }
    function close()
    {
        $this->db->close();
    }


}
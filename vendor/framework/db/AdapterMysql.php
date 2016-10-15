<?php

/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 26.08.2016
 * Time: 14:39
 */
namespace PolPav\DB;


class AdapterMysql implements AdapterDB
{
    private $db;
    protected $sql, $query;


    function  __construct($config){
            $this->db = new \mysqli($config['db']['host'],$config['db']['user'],
                                    $config['db']['password'],$config['db']['db_name']);
        if($this->db){
            echo 'Connected';
        }
    }

    function query($sql){
            $this->sql = $sql;
            $this->db->query($sql);
        if(!$this->db){
            return $this->db->error;
        }
            return $this->db->query($sql);
    }

    function fetch($type){
        switch ($type){
            case 'index': return $this->db->query($this->sql)->fetch_row();
            break;
            case 'assoc': return $this->db->query($this->sql)->fetch_assoc();
            break;
            case 'all': return $this->db->query($this->sql)->fetch_all();
            break;
            default: throw new \Exception("Input not correctly");
        }

    }

    function close(){
       return $this->db->close();
    }


}

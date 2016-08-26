<?php

/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 26.08.2016
 * Time: 14:33
 */
namespace polpav\framework;


use polpav\framework\db\AdapterMysql;
use polpav\framework\db\AdapterSqlite;
use polpav\framework\db\AdapterPostgre;


class FactoryAdapter
{
    private static $adapter;


    static public function getConnection($name, $config){
        switch ($name){
            case 'mysql': return self::$adapter = new AdapterMysql($config);
                break;
            case 'sqlite': return self::$adapter = new AdapterSqlite($config);
                break;
            case 'postgres': return self::$adapter = new AdapterPostgre($config);
                break;
            default: return new \Exception("This database not found");
        }
    }
}
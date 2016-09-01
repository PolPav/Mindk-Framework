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

    private static $adapters = [];


    static public function getConnection($name, $config)
    {
        switch ($name) {
            case 'mysql':
                if (!isset(self::$adapters['mysql'])) {
                    self::$adapters['mysql'] = new AdapterMysql($config);
                }
                return self::$adapters['mysql'];
                break;
            case 'sqlite':
                if (!isset(self::$adapters['sqlite'])) {
                    self::$adapters['mysql'] = new AdapterSqlite($config);
                }
                return self::$adapters['mysql'];
                break;
            case 'postgres':
                if (!isset(self::$adapters['postgres'])) {
                    self::$adapters['postgres'] = new AdapterPostgre($config);
                }
                return self::$adapters['postgres'];
                break;
            default:
                return new \Exception("This database not found");
        }
    }
}
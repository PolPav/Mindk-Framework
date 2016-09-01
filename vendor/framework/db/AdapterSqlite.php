<?php

/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 26.08.2016
 * Time: 14:40
 */
namespace polpav\framework\db;


class AdapterSqlite implements AdapterDB
{
    function __construct()
    {
        echo "Database SQLite Connected";
    }

    function  query($sql){}
    function  fetch($result, $array_type){}
    function close(){}
}
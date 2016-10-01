<?php

/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 26.08.2016
 * Time: 14:39
 */
namespace polpav\framework\db;


interface AdapterDB
{

    function query($sql);

    function fetch($type);

    function close();
}
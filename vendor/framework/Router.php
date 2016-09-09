<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 28.08.2016
 * Time: 10:33
 */

namespace polpav\framework;


class Router
{
    static $_instance;

    public static function getInstance($routing_map)
    {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self($routing_map);
        return self::$_instance;
    }

    private function __construct($routing_map)
    {
        $query = $_SERVER['REQUEST_URI'];

        preg_match('/\/([a-z])+/', $query, $pattern);
        foreach ($routing_map as $map) {
            if ($pattern[0] == $map['pattern'] && $map['method'] == ''){
                preg_match('/([a-zA-Z]+\\\[a-zA-Z]+\\\[a-zA-Z]+)(@)+([a-zA-Z]+)(:)([a-z_0-9]*)/', $map['class'], $result);
                    $class = new $result[1]();
                    $class->$result[3]($result[5]);
            }
            elseif($pattern[0] == $map['pattern'] && $_SERVER['REQUEST_METHOD'] == $map['method']){
                preg_match('/([a-zA-Z]+\\\[a-zA-Z]+\\\[a-zA-Z]+)(@)+([a-zA-Z]+)(:)([a-z_0-9]*)/', $map['class'], $result);
                    $class = new $result[1]();
                    $class->$result[3]($result[5]);
            }
        }
    }
}









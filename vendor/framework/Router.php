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

    public static function getInstance($routing_map) {
        if(!(self::$_instance instanceof self))
            self::$_instance = new self($routing_map);
        return self::$_instance;
    }
    
    private function __construct($routing_map){
        $query = $_SERVER['REQUEST_URI'];
        $slash = explode('/', trim($query,'/'));
        if($slash[0] == $routing_map[0]['pattern']) {
             new $routing_map[0]['class'];
        }

        if($slash[0] == $routing_map[1]['pattern']){
            $class = new $routing_map[1]['class'];
            $class->$routing_map[1]['method']($slash[1]);

        }

        if($slash[0] == $routing_map[2]['pattern']){
            $class = new $routing_map[2]['class'];
            $class->$routing_map[2]['method']($slash[1]);
        }

        if($slash[0] == $routing_map[3]['pattern']){
            $class = new $routing_map[3]['class'];
            $class->$routing_map[3]['method']($slash[1]);
        }

        if($slash[0] == $routing_map[4]['pattern']){
            $class = new $routing_map[4]['class'];
            $class->$routing_map[4]['method']($slash[1]);
        }

        if($slash[0] == $routing_map[5]['pattern']){
            $class = new $routing_map[5]['class'];
            $class->$routing_map[5]['method']($slash[1]);
        }

    }

}
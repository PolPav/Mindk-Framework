<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 9:29
 */

namespace polpav\framework;


class App
{
    /**
     * @var array config
     */
    private $config = [];

    /**
     * @param $name
     *
     * @return array $config
     */
    public function __get($name){
        if ($name == 'config'){
            return $this->config;
        }
        return "<h3>Not correctly input configuration property</h3>";
    }

    /** function takes a array  configuration, and passing array of routes
     * App constructor
     * @param $config
     */
    public function __construct($config){
        $this->config = $config;
        $this->route($config['routes']);
    }

    public function run(){
        echo "<br>Start<br>";
    }

    public function done(){
        echo "Done<br>";
    }

    /** function takes a array and call method in selected route
     * @param $routing_map
     * @return object
     */
    public function route($routing_map){
        return  Router::getInstance($routing_map);
    }


    /** function takes a $name database and configuration to connected with factory method getConnection()
     * @param $name
     * @param $config
     * @return object
     */

    public function connect($name, $config){
       return FactoryAdapter::getConnection($name, $config);
    }
}
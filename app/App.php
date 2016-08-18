<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 9:29
 */

namespace shop\app;


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

    /** function takes a array and call method index() in selected route
     * @param $routing_map
     */
            public function route($routing_map){
               $query = $_SERVER['REQUEST_URI'];
                if (array_key_exists($query, $routing_map)) {
                        $class = new $routing_map[$query]();
                        $class->index();
                  }
            }
}
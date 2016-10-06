<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 28.08.2016
 * Time: 10:33
 */

namespace PolPav;


    class Router
    {
        private static $route;
        protected $controller, $action, $params, $router, $routing_map, $id;
        
        public static function getInstance($routing_map = null)
        {
            if (!(self::$route instanceof self))
                self::$route = new self($routing_map);
                return self::$route;
        }

        /**
         * Router constructor
         * function initialize routing
         * @param $routing_map
         */

        private function __construct($routing_map = null)
        {
            $this->routing_map = $routing_map;
        }

        /**
         *function add new configuration
         *@param $pattern
         * @param $class
         * @param $action
         * @param $params
         */
       public function queryBuild($pattern, $class, $action, $params)
        {
            $build = ['pattern' => $pattern,
                'class' => $class,
                'action' => $action,
                'params' => $params];
            $this->routing_map[] = $build;
        }

        /**
         * function check the url and return route if available
         * @return string
         */
        public function getRoute()
        {
            $query = $_SERVER['REQUEST_URI'];

            preg_match('/\/([a-z0-9]+)(\/?)([a-z0-9]+)/', $query, $pattern);
                if($pattern[0]==null){
                    $pattern[0] = '/';
            }
            foreach ($this->routing_map as $map) {
                if ($pattern[0] == $map['pattern'] && $_SERVER['REQUEST_METHOD'] == $map['method']) {
                    $this->router = $map['pattern'];
                    $this->controller = $map['class'];
                    $this->action = $map['action'];
                    $this->params = $map['params'];
                } elseif ($pattern[0] == $map['pattern'] && $map['method'] == '') {
                    $this->router = $map['pattern'];
                    $this->controller = $map['class'];
                    $this->action = $map['action'];
                    $this->params = $map['params'];
                }
            }
            return $this->router;
        }

        public function getController()
        {
            return $this->controller;
        }

        public function getAction()
        {
            return $this->action;
        }

        public function getParams()
        {
            return $this->params;
        }


    }


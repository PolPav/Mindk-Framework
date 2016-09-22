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
    static $route;
    protected $controller, $action, $params;

    public static function getInstance($routing_map)
    {
        if (!(self::$route instanceof self))
            self::$route = new self($routing_map);
        return self::$route;
    }

    /** function initialize routing and assigns values,
     * App constructor
     * @param $routing_map
     */

    private function __construct($routing_map)
    {
        $query = $_SERVER['REQUEST_URI'];

        preg_match('/\/([a-z0-9]+)(\/?)([a-z0-9]+)/', $query, $pattern);

          foreach ($routing_map as $map) {
          if ($pattern[0] == $map['pattern'] && $_SERVER['REQUEST_METHOD'] == $map['method']) {
              $this->controller = $map['class'];
              $this->action = $map['action'];
              $this->params = $map['params'];
          }
          elseif ($pattern[0] == $map['pattern'] && $map['method'] == '') {
                  $this->controller = $map['class'];
                  $this->action = $map['action'];
                  $this->params = $map['params'];
          }
       }
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /** function create Controller and call it action with reflection,
     *
     */

    public function getRoute(){
        if(class_exists($this->getController())){
            $response = new \ReflectionClass($this->getController());
            if($response->hasMethod($this->getAction())){
                $class = $response->newInstance();
                $method = $response->getMethod($this->getAction());
                $method->invoke($class,$this->getParams());
            }
        }
    }
}








//  foreach ($routing_map as $map) {
//      if ($slash[0] == $map['pattern'] && $_SERVER['REQUEST_METHOD'] == $map['method']) {
//          $class = new $map['class'];
//          $class->$map['action']($map['params']);
//      }
//      elseif ($slash[0] == $map['pattern'] && $map['method'] == ''){
//          $class = new $map['class'];
//          $class->$map['action']($map['params']);
//      }
//   }
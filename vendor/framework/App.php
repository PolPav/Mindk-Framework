<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 9:29
 */

namespace PolPav;


use PolPav\Response\Response;


class App
{
    /**
     * @var array config
     */

    private $config = [];
    
    /**
     * @param $name
     * @return array $config
     */

    public function __get($name)
    {
        if ($name == 'config'){
            return $this->config;
        }
            return "<h3>Not correctly input configuration property</h3>";
    }

    /** function takes a array  configuration,
     * App constructor
     * @param $config
     */

    public function __construct($config)
    {
        $this->config = $config;
    }
    
    /**
     * function takes request, find route and give response,
     */

    public function run()
    {
        $request = new Request();
        $request->get();
        $current_route = Router::getInstance($this->config['routes']);
        $response = new Response();
        $response->send();
        if($request->get() == $current_route->getRoute()) {
            $this->route($current_route->getRoute());
        }
    }

    /**
     *function dynamically add new configuration
     *@param $pattern
     * @param $class
     * @param $action
     * @param $params
     */

    public function queryBuilder($pattern, $class, $action, $params)
    {
        $build = Router::getInstance($this->config['routes']);
        $build->queryBuild($pattern, $class, $action, $params);
    }

    /**
     * function create Controller and call it action with reflection,
     *@param $routing_map
     */

    public function route($routing_map = null)
    {
        $route = Router::getInstance($routing_map);
        if(class_exists($route->getController())){
            $front = new \ReflectionClass($route->getController());
            if($front->hasMethod($route->getAction())){
                $class = $front->newInstance();
                $method = $front->getMethod($route->getAction());
                $method->invoke($class,$route->getParams());
            }
        }
    }
    
    /**
     * function takes a $name database and configuration to connected with correct database()
     * @param $name
     * @param $config
     * @return object
     */
    
    public function connect($name, $config)
    {
       return FactoryAdapter::getConnection($name, $config);
    }
}

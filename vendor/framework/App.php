<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 16.08.2016
 * Time: 9:29
 */

namespace polpav\framework;


use polpav\framework\response\Response;
use polpav\framework\response\ResponseRedirect;

class App
{
    /**
     * @var array config
     */
    private $config = [];
    public $request;
    public $content;

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

    /** function takes a array  configuration,
     * App constructor
     * @param $config
     */
    public function __construct($config){
        $this->config = $config;
        $this->request = new Request();
    }

    /** function call function from initialized routing,
     */
    public function run(){
        $route = Router::getInstance($this->config['routes']);
        $router = $route->getRoute();
        $this->route($router);

    }

    /** function send headers and content,
     * @param $content
     * @param $status
     */
    public function response($content, $status = 200){
        $this->content = $content;
        $response = new Response($content, $status);
        $response->send();
    }
    public function redirect($link){
        $redirect = new ResponseRedirect($link);
        $redirect->send();
    }
    public function queryBuilder($pattern, $class, $action, $params){
        $build = Router::getInstance($this->config['routes']);
        $build->queryBuild($pattern, $class, $action, $params);
    }


    public function get($pattern, callable $callable = null){
        $route = Router::getInstance($this->config['routes']);
        $router = $route->getRoute();
        if($pattern == $router){
            $this->route($this->config['pattern']);
            ob_start();
            call_user_func($callable);
        }
        elseif ($pattern != $router && $callable !=null && $_SERVER['REQUEST_URI'] == $pattern){
            ob_start();
            call_user_func($callable);
        }
    }

    /** function create Controller and call it action with reflection,
     *@param $routing_map
     */

    public function route($routing_map = null){
        $route = Router::getInstance($routing_map);
        if(class_exists($route->getController())){
            $response = new \ReflectionClass($route->getController());
            if($response->hasMethod($route->getAction())){
                $this->render();
                $class = $response->newInstance();
                $method = $response->getMethod($route->getAction());
                $method->invoke($class,$route->getParams());
            }

        }
    }

    public function render(){
        ob_start();
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
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

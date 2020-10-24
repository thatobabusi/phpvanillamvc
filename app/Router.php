<?php

namespace App\App;

/**
 * Class Router
 * @package App\App
 */
class Router
{
    /**
     * @var array[]
     */
    protected $routes = [
      "GET" => [],
      "POST" => [],
    ];

    /**6y
     * @param string $file
     * @return static
     */
    public static function load(string $file)
    {
        $router = new static();
        require $file;
        return $router;
    }

    /**
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller)
    {
          $this->routes["GET"][$uri] = $controller;
    }

    /**
     * @param $uri
     * @param $controller
     */
    public function post($uri, $controller)
    {
        $this->routes["POST"][$uri] = $controller;
    }

    /**
     * @param string $uri
     * @param string $method
     * @return mixed|void
     * @throws \Exception
     */
    public function redirect(string $uri, string $method)
    {
        $array_key_exists = array_key_exists($uri, $this->routes[$method]);

        if($array_key_exists)
        {
            return $this->callAction(...explode('@', $this->routes[$method][$uri]));
        }

        return view("errors/404.php");
    }

    /**
     * @param array $controller
     * @param array $action
     * @return mixed
     * @throws \Exception
     */
    public function callAction($controller = [], $action = [])
    {
        $controller =  "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if(!method_exists($controller, $action))
        {
            throw new \Exception("{$controller} does not have {$action}");
        }

        return $controller->$action();
    }
}
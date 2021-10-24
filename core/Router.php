<?php

namespace App\Core;

use Exception;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    // load file routes.php vào để khởi tạo định tuyến
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    // set danh sách các định tuyến (URI) tương ứng với controller
    public function define($routes)
    {
        $this->routes = $routes;
    }

    // return controller tương úng với uri
    public function direct($uri, $method)
    {
        // kiểm tra URI có trong danh sách định tuyến ko
        // nếu có thì controller tương ứng với URI đó sẽ được thực thi
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->callAction(
                ...explode('@', $this->routes[$method][$uri])
            );
        }

        // nếu không trả về lỗi
        throw new Exception("No route defined!");
    }
    //routes with GET method
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }
    //routes with POST method
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    private function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not have the {$action} action."
            );
        }

        return (new $controller)->$action();
    }
}

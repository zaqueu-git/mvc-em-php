<?php
namespace application\core;

use application\helpers\CustomErrors;

class App
{
    private $routes = [];
    private $method;
    private $path;
    private $params;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        
        $path = parse_url($_SERVER['REQUEST_URI']);
        $path = strtolower($path['path']);
        $path = trim($path,'');
        $path = str_replace(PATH_FOLDER, '/', $path);
        
        $this->path = $path;
    }

    public function get(string $route, string $action)
    {
        $this->add('GET', $route, $action);
    }

    public function post(string $route, string $action)
    {
        $this->add('POST', $route, $action);
    }

    public function add(string $method, string $route, string $action)
    {
        $this->routes[$method][$route] = $action;
    }

    public function run()
    {
        if (empty($this->routes[$this->method])) {
            return $this->executeRoute('NotFoundController::pageNotFound');
        }

        if (isset($this->routes[$this->method][$this->path])) {
            return $this->executeRoute($this->routes[$this->method][$this->path]);
        }

        foreach ($this->routes[$this->method] as $route => $action) {
            $result = $this->checkUrl($route, $this->path);
            if ($result >= 1) {
                return $this->executeRoute($action);
            }
        }

        return $this->executeRoute('NotFoundController::pageNotFound');
    }

    private function checkUrl(string $route, $path)
    {
        preg_match_all('/\{([^\}]*)\}/', $route, $variables);

        $regex = str_replace('/', '\/', $route);

        foreach ($variables[0] as $k => $variable) {
            $replacement = '([a-zA-Z0-9\-\_\ ]+)';
            $regex = str_replace($variable, $replacement, $regex);
        }

        $regex = preg_replace('/{([a-zA-Z]+)}/', '([a-zA-Z0-9+])', $regex);
        $result = preg_match('/^' . $regex . '$/', $path, $params);
        $this->params = $params;

        return $result;
    }

    private function executeRoute(string $route)
    {
        try {

            $route = 'application\controllers\~~' . $route;
            $route = str_replace('~~', '', $route);
            $route = explode('::', $route);
            
            $controller = new $route[0];
            $method = $route[1];
    
            echo $controller->$method($this->params);

        } catch (\Throwable $th) {
            new CustomErrors($th);
        }
    }
}
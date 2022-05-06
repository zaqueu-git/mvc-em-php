<?php
namespace application\core;

class App
{
    private $routes = [];
    private $method;
    private $path;
    private $params;

    public function __construct()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $path = parse_url($_SERVER['REQUEST_URI']);
        $path = strtolower($path['path']);
        $path = trim($path,'');
        $path = str_replace(PATH_FOLDER, '/', $path);

        $this->method = $method;
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

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function handler()
    {
        if (empty($this->routes[$this->method])) {
            return false;
        }

        if (isset($this->routes[$this->method][$this->path])) {
            return $this->routes[$this->method][$this->path];
        }

        foreach ($this->routes[$this->method] as $route => $action) {
            $result = $this->checkUrl($route, $this->path);
            if ($result >= 1) {
                return $action;
            }
        }

        return false;
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

}
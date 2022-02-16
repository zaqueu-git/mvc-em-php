<?php
namespace application\core;

class App
{
    private $url;
    private $class;
    private $method;

    public function __construct() 
    {
        try {
            
            $this->getUrl();
            $this->getClass();
            $this->getMethod();
            $this->getController();

            call_user_func_array([$this->class, $this->method], []);

        } catch (\Throwable $e) {
            // myCustomErrorHandler
        }
    }

    private function getController()
    {
        $class = $this->class;
        $method = $this->method;

        if (file_exists('../application/controllers/' . $class . '.php')) {
            require '../application/controllers/' . $class . '.php';

            $class = new $class();

            if (method_exists($class, $method)) {
                $this->class = $class;
                return true;
            }
        }

        $class = "NotFoundController";
        $method = "pageNotFound";

        if (file_exists('../application/controllers/' . $class . '.php')) {
            require '../application/controllers/' . $class . '.php';

            $class = new $class();

            if (method_exists($class, $method)) {
                $this->class = $class;
                $this->method = $method;
                return true;
            }
        }        

        echo "Could not find control.";        
        die();
    }

    private function getUrl()
    {
        $this->url = parse_url($_SERVER['REQUEST_URI']);
        $this->url = strtolower($this->url['path']);
        $this->url = trim($this->url,'');
        $this->url = str_replace(PATH_FOLDER, '', $this->url);
        $this->url = explode('/', $this->url);
        return true;
    }

    private function getClass()
    {
        // StudyCaps

        if (!empty($this->url[0])) {

            $class = explode('-', $this->url[0]);

            foreach ($class as $key => $value) {
                $class[$key] = ucfirst($value) . "Controller";
            }

            $this->class = implode("", $class);
        }

        return true;
    }

    private function getMethod()
    {
        // camelCase

        if (!empty($this->url[1])) {

            $method = explode('-', $this->url[1]);

            foreach ($method as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                $method[$key] = ucfirst($value);
            }

            $this->method = implode("", $method);
        }

        return true;
    }
}
<?php
namespace application\models\helpers;

class Request
{
    private $array = [];
    private $errors = [];

    private function required($required, $value)
    {
        if ($required) {
            if (empty($value)) {
                return false;
            }
        }
        return true;
    }

    private function length($lengthMin, $lengthMax, $value)
    {
        if (strlen($value) < $lengthMin || strlen($value) > $lengthMax) {
            return false;
        }
        return true;
    }

    private function type($type, $value)
    {
        if ($type == gettype($value)) {
            return true;
        }
        return false;
    }

    private function search($params)
    {
        foreach ($params as $key => $value) {
            $keyArray = array_key_exists($key, $this->array);

            if ($keyArray === false) {
                unset($params[$key]);
                continue;
            }

            $params[$key] = trim($params[$key]);

            if (!$this->array[$key]['required']) {
                $this->array[$key]['min'] = -1;
            }

            if (!$this->type($this->array[$key]['type'], $params[$key])) {
                
                $this->errors[$key] = "invalid field";

            } else if (!$this->required($this->array[$key]['required'], $params[$key])) {

                $this->errors[$key] = "required field";

            } else if (!$this->length($this->array[$key]['min'], $this->array[$key]['max'], $value)) {
                
                $this->errors[$key] = "number of invalid characters";

            }

            unset($this->array[$key]);
        }

        foreach ($this->array as $key => $value) {
            $params[$key] = null;
            $this->errors[$key] = "invalid field";
        }

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $_GET = $params;
                break;
            case 'POST':
                $_POST = $params;
                break;
        }
    }

    public function valid()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->search($_GET);
                break;
            case 'POST':
                $this->search($_POST);              
                break;
        }
        return $this->errors;
    }

    public function add(string $name, string $type, bool $required = true, int $min = 1, int $max = 255)
    {
        $this->array[$name] = [
            "type" => $type,
            "required" => $required,
            "min" => $min,
            "max" => $max,
        ];
    }    
}

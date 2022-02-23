<?php
namespace application\libraries\exceptions;

use Exception;

class MyCustomException extends Exception {

    public function __construct($message = null)
    {
        $this->message = "[EXCEPTION] message:" . $message . " | file:" . $this->file . " | line:" . $this->line;
    }
}
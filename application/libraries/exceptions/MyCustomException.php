<?php
namespace application\libraries\exceptions;

use Exception;

class MyCustomException extends Exception {

    public function __construct($message = null)
    {
        $string = "time: " . date("H:m:s") . " | message: " . $message . " | file: " . $this->file . " | line: " . $this->line;
        
        $this->saveTxt($string);
    }

    private function saveTxt($string)
    {
        $string .= "\n";
        $pathFolder = PATH_ROOT . "\/files\/exceptions\/";
        $pathFile = $pathFolder . date("Y-m-d") . ".txt";        

        if(!file_exists($pathFolder)){
            mkdir($pathFolder);
        }

        $file = fopen($pathFile, "a");  
        $fileSize = filesize($pathFile);
        
        if ($fileSize > 2000) {
            return false;
        }

        fwrite($file, $string);
        fclose($file);
    
        return true;
    }

}
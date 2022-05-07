<?php
namespace application\helpers;

use Exception;

class CustomExceptions extends Exception
{
    public function __construct($customMessage)
    {
        parent::__construct($customMessage);
    }

    public function save()
    {
        $body = [
            'time' => date('H:m:s'),
            'error' => $this->getMessage(),
            'line' => $this->getLine(),
            'file' => $this->getFile(),
        ];

        $body = '||' . json_encode($body);

        $pathFolder = PATH_ROOT . '\/files\/erros\/';
        $pathFile = $pathFolder . date('Y-m-d') . '.txt';        

        if(!file_exists($pathFolder)){
            mkdir($pathFolder);
        }

        $file = fopen($pathFile, 'a');  
        $fileSize = filesize($pathFile);
        
        if ($fileSize > 2000) {
            return false;
        }

        fwrite($file, $body);
        fclose($file);
    }
}
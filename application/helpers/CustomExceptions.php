<?php
namespace application\helpers;

use Exception;

class CustomExceptions extends Exception
{
    public function __construct(string $customMessage)
    {
        parent::__construct($customMessage);
    }

    public function save()
    {
        $body = [
            'time' => date('H:m:s'),
            "message" => $this->getMessage(),
            "trace" => $this->getTraceAsString(),
            '---------------------',
        ];
        $body = implode(PHP_EOL, $body);

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
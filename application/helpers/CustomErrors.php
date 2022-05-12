<?php
namespace application\helpers;

class CustomErrors
{
    public function __construct($error)
    {
        $body = [
            'time' => date('H:m:s'),
            'error' => (string) $error,
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
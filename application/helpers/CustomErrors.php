<?php
namespace application\helpers;

class CustomErrors
{
    public function __construct(string $error)
    {
        $body = [
            'time' => date('H:m:s') . PHP_EOL,
            'error' => $error . PHP_EOL,
            '---------------------' . PHP_EOL,
        ];
        $body = implode('', $body);

        $pathFolder = PATH_ROOT . '\/files\/erros\/';
        $pathFile = $pathFolder . date('Y-m-d') . '.txt';        

        if(!file_exists($pathFolder)){
            mkdir($pathFolder);
        }

        $file = fopen($pathFile, 'a');  
        $fileSize = filesize($pathFile);

        if ($fileSize > 1000000000) {
            return false;
        }

        fwrite($file, $body);
        fclose($file);
    }
}
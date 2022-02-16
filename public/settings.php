<?php
// DEPURAÇÃO
define('DEBUG', true);

// PASTA DO PROJETO NO SERVIDOR
define('PATH_FOLDER', '/mvc/');

// CAMIMNHO RAIZ NO SERVIDOR
define('PATH_ROOT', dirname(__FILE__));

// URL RAIZ
define('URL_ROOT', $_SERVER['HTTP_HOST']);

// DEFINE SE VAI MOSTRAR OS ERROS
ini_set('display_errors', DEBUG);
ini_set('display_startup_erros', DEBUG);

// DEFINE O HORÁRIO DO SERVIDOR
date_default_timezone_set('America/Sao_Paulo');

// TRATAMENTO DE ERROS E EXCEÇÕES
function myCustomErrorHandler(int $errNo, string $errMsg, string $file, int $line) {
    if (DEBUG == true) {
        echo "#[$errNo] occurred in [$file] at line [$line]: [$errMsg]";
    }
}

set_error_handler('myCustomErrorHandler');
?>
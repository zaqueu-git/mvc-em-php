<?php
// DEFINE O HORÁRIO DO SERVIDOR

date_default_timezone_set('America/Sao_Paulo');

// DEPURAÇÃO (localhost, homologation, production)

define('DEBUG', 'localhost');

// PASTA DO PROJETO NO SERVIDOR

define('PATH_FOLDER', '/mvc/');

// CAMIMNHO RAIZ NO SERVIDOR

define('PATH_ROOT', dirname(__FILE__));

// URL RAIZ

define('URL_ROOT', $_SERVER['HTTP_HOST']);

// MOSTRAR ERROS

if (DEBUG == 'production') {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
} else {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}   
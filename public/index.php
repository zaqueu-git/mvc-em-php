<?php
require 'autoload.php';
require 'settings.php';

use application\core\App;

$App = new App();

$App->get('/', 'HomeController::init');
$App->get('/acesso', 'AccessController::access');
$App->get('/acesso/entrar/{id}', 'AccessController::login');
$App->get('/acesso/sair', 'AccessController::logout');
$App->get('/acesso/recuperar-senha', 'AccessController::recoverPassword');

$result = $App->handler();

if (!$result) {
    $result = 'NotFoundController::pageNotFound';
}

if (is_string($result)) {
    $result = 'application\controllers\~~' . $result;
    $result = str_replace('~~', '', $result);
    $result = explode('::', $result);    

    $controller = new $result[0];
    $action = $result[1];

    echo $controller->$action($App->getParams());
}
?>
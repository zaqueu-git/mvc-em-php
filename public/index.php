<?php
require 'autoload.php';
require 'settings.php';

use application\core\App;

$App = new App();

$App->get('/', 'HomeController::init');

$App->get('/exemplo-cadastrar-cliente', 'ExampleClientController::create');

/*
$App->get('/acesso', 'AccessController::access');
$App->get('/acesso/entrar/{id}', 'AccessController::login');
$App->get('/acesso/sair', 'AccessController::logout');
$App->get('/acesso/recuperar-senha', 'AccessController::recoverPassword');
*/

$App->run();
?>
<?php
namespace application\core;

class Controller
{
    public function view($view, $data = [])
    {
        header('Content-Type: text/html; charset=UTF-8');
        require '../public/header.php';
        require '../public/template.php';
        require '../public/footer.php';
    }
}
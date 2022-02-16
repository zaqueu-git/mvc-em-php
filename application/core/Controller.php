<?php
namespace application\core;

class Controller
{
    public function view($view, $data = [])
    {
        try {

            header('Content-Type: text/html; charset=UTF-8');
            require '../public/header.php';
            require '../public/template_default.php';
            require '../public/footer.php';

        } catch (\Throwable $e) {
            // myCustomErrorHandler
        }
    }
}
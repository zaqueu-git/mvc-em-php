<?php
namespace application\core;

class Controller
{
    public function viewRequest($data)
    {
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($data);
        die();
    }

    public function view($view, $data = [])
    {
        header('Content-Type: text/html; charset=UTF-8');
        require '../public/header.php';
        require '../public/template.php';
        require '../public/footer.php';
    }
}
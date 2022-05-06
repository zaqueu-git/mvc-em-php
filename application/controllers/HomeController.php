<?php
namespace application\controllers;

use application\core\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function init()
    {
        echo "página inicial<br>";
    }
}
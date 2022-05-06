<?php
namespace application\controllers;

use application\core\Controller;

class AccessController extends Controller
{
    public function access()
    {
        echo "access controller<br>";
    }

    public function login($params)
    {
        echo "login controller<br>";
    }

    public function logout()
    {
        echo "logout controller<br>";
    }

    public function recoverPassword()
    {
        echo "recover password controller<br>";
    }
}
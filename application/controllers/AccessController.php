<?php
use application\core\Controller;
use application\models\Access\Access;

class AccessController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        echo "login controller<br>";

        $Access = new Access();
        $Access->login();
    }

    public function logout()
    {
        echo "logout controller<br>";

        $Access = new Access();
        $Access->logout();
    }

    public function recoverPassword()
    {
        echo "recover password controller<br>";

        $Access = new Access();
        $Access->recoverPassword();
    }
}
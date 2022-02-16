<?php
use application\core\Controller;
use application\models\Access;

class AccessController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        echo "login controller";
    }

    public function logout()
    {
        echo "logout controller";
    }

    public function recoverPassword()
    {
        echo "recover password controller";
        $Access = new Access("model");
        $Access->recoverPassword();
    }
}
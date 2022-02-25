<?php
namespace application\models\access;

use application\libraries\exceptions\MyCustomException;

class Access
{
    public function __construct()
    {
    }

    public function login()
    {
        echo "login model<br>";
    }

    public function logout()
    {
        echo "logout model<br>";
    }

    public function recoverPassword()
    {
        echo "recover password model<br";
    }
}
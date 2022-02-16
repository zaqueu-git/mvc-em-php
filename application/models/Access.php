<?php
namespace application\models;

use application\core\Database;
use PDO;

class Access
{
    private $conn;
    private $pars;

    public function __construct($pars)
    {
        $Database = new Database("localhost");
        $this->conn = $Database->getConn();

        $this->pars = $pars;
    }

    public function login()
    {
    }

    public function logout()
    {
    }

    public function recoverPassword()
    {
        echo "<br>recover password " . $this->pars;
    }
}
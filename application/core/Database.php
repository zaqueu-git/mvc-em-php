<?php
namespace application\core;

use PDO;

class Database
{
    private $conn;
    
    public function __construct($type)
    {
        switch ($type) {
            case 'localhost':
                $this->localhost();
                break;
            default:
                # code...
                break;
        }
    }

    private function localhost()
    {
        $dbServer = "localhost";
        $dbName = "basetest";
        $dbUser = "root";
        $dbPassword = "";

        $dbDriver = 'mysql:dbname='. $dbName .';host=' . $dbServer;

        $pdo = new PDO($dbDriver,$dbUser,$dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("set names utf8");

        $this->conn = $pdo;

    }

    public function getConn()
    {
        return $this->conn;
    }
}

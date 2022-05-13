<?php
namespace application\core;

use application\helpers\Database;
use application\helpers\DataAccessObject;

class Model
{
    protected function dbsystem()
    {
        $dbServer = "localhost";
        $dbName = "basetest";
        $dbUser = "root";
        $dbPassword = "";

        if ($_SERVER['HTTP_HOST'] == "URL HOMOLOGATION") {
            $dbServer = "";
            $dbName = "";
            $dbUser = "";
            $dbPassword = "";
        }
        if ($_SERVER['HTTP_HOST'] == "URL PRODUCTION") {
            $dbServer = "";
            $dbName = "";
            $dbUser = "";
            $dbPassword = "";
        }

        $Database = new Database();
        $Conn = $Database->mysql($dbServer, $dbName, $dbUser, $dbPassword);

        return new DataAccessObject($Conn);
    }
}

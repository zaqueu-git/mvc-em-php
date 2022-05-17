<?php
namespace application\core;

use application\models\helpers\Database;
use application\models\helpers\DataAccessObject;

class Model
{
    protected function dbsystem()
    {
        $dbServer = "localhost";
        $dbName = "basetest";
        $dbUser = "root";
        $dbPassword = "";
        $dbNotice = "localhost";

        if ($_SERVER['HTTP_HOST'] == "URL HOMOLOGATION") {
            $dbServer = "";
            $dbName = "";
            $dbUser = "";
            $dbPassword = "";
            $dbNotice = "homologation";
        }
        if ($_SERVER['HTTP_HOST'] == "URL PRODUCTION") {
            $dbServer = "";
            $dbName = "";
            $dbUser = "";
            $dbPassword = "";
            $dbNotice = "production";
        }

        $Database = new Database();
        $Conn = $Database->mysql($dbServer, $dbName, $dbUser, $dbPassword);

        if (DEBUG) {
            echo "<div style='position: absolute; top: 0; right: 0; padding: 10px; background: #ff0000; color: #ffffff; font-weight: 800; text-transform: uppercase; font-size: 12px;'>BD: $dbNotice</div>";
        }

        return new DataAccessObject($Conn);
    }
}

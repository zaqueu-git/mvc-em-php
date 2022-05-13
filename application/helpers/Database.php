<?php
namespace application\helpers;

use PDO;
use application\helpers\CustomErrors;

class Database
{
    public function mysql($dbServer, $dbName, $dbUser, $dbPassword)
    {
        try {
            $dbDriver = 'mysql:dbname='. $dbName .';host=' . $dbServer;            

            $PDO = new PDO($dbDriver,$dbUser,$dbPassword);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $PDO->exec("set names utf8");

            return $PDO;
        } catch (\Throwable $th) {
            new CustomErrors($th);
        }
    }
}
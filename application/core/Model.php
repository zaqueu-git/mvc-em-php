<?php
namespace application\core;

use application\helpers\Database;

class Model
{
    public $systemConn;

    public function __construct()
    {
        switch (DEBUG) {
            case 'localhost':
               $this->localhost();
                break;
            case 'homologation':
                $this->homologation();
                break;
            case 'production':
                $this->production();
                break;
        }
    }

    private function localhost()
    {
        $Database = new Database();
        $Database->mysql("localhost", "basetest", "root", "");
        $this->systemConn = $Database;
    }

    private function homologation()
    {
        $Database = new Database();
        $Database->mysql("dbServer", "dbName", "dbUser", "dbPassword");
        $this->systemConn = $Database;
    }

    private function production()
    {
        $Database = new Database();
        $Database->mysql("dbServer", "dbName", "dbUser", "dbPassword");
        $this->systemConn = $Database;
    }    
}
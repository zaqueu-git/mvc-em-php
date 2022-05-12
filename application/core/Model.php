<?php
namespace application\core;

use application\helpers\Database;

class Model
{
    public $systemConn;

    public function __construct()
    {
        switch ($_SERVER['HTTP_HOST']) {
            case 'localhost':
               $this->localhost();
                break;
            case 'URL HOMOLOGATION':
                $this->homologation();
                break;
            case 'URL PRODUCTION':
                $this->production();
                break;
            default:
                $this->localhost();
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

<?php
namespace application\models;

use application\core\Model;
use application\helpers\DataAccessObject;

class ExampleClientDAO extends Model
{
    private $conn;
    
    public function __construct()
    {
        this->conn = new DataAccessObject($this->systemConn);
    }
    
    public function create()
    {
        $rs = $conn->select("SELECT * FROM people");
        var_dump($rs);
    }
}

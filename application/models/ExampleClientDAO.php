<?php
namespace application\models;

use application\core\Model;

class ExampleClientDAO extends Model
{
    private $dbsystem;

    public function __construct()
    {
        $this->dbsystem = $this->dbsystem();
    }
    
    public function create($Client)
    {
        $rs = $this->dbsystem->insert("people", ["name" => "teste"]);
    }
}
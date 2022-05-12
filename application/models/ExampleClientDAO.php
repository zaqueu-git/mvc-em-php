<?php
namespace application\models;

use application\core\Model;
use application\helpers\DataAccessObject;

class ExampleClientDAO extends Model
{
    public function create()
    {
        $DataAccessObject = new DataAccessObject($this->systemConn);

        //$rs = $DataAccessObject->select("SELECT * FROM people");

        var_dump($this->systemConn);

        /*
        $data = $conn->query('SELECT * FROM minhaTabela WHERE nome = ' . $conn->quote($name));

        foreach($data as $row) {
            print_r($row);
        }
        */

    }
}
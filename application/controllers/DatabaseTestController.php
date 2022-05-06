<?php
namespace application\controllers;

use application\core\Controller;
use application\libraries\exceptions\MyCustomException;
use application\models\database\Database;

class DatabaseTestController extends Controller
{
    public function test()
    {
        try {

            $Database = new Database("localhost");
            $conn = $Database->getConn();

            if ($conn == false) {
                throw new MyCustomException("Error connecting to database");
            }

            echo "Connected database";

        } catch (MyCustomException $e) {
            echo $e->getMessage();
        }
    }
}
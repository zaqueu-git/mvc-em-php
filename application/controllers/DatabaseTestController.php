<?php
namespace application\controllers;

use application\core\Controller;
use application\helpers\database\Database;
use application\helpers\CustomExceptions;

class DatabaseTestController extends Controller
{
    public function test()
    {
        try {

            $Database = new Database("localhost");
            $conn = $Database->getConn();

            if ($conn == false) {
                throw new CustomExceptions("Error connecting to database");
            }

            echo "Connected database";

        } catch (CustomExceptions $e) {
            $e->save();
        }
    }
}
<?php

namespace Datingapp;

interface DbhInterface
{
}

use Mysqli;
use Exception;
use PDO;

abstract class Dbh
{
    protected function connect()
    {
        try {
            $host = "localhost";
            $username = "root";
            $password = "password";
            $database = "dating";

            $dbh = new mysqli($host, $username, $password, $database);
            return $dbh;
        } catch (Exception $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }
    protected function connectOOP()
    {

        $serverHost = "localhost";
        $db_name = "dbname";
        $username = "username";
        $pass = "password";

        try {
            $conn = new PDO("mysql:host=$serverHost;dbname=$db_name", $username, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'connection on...';
        } catch (Exception $e) {
            echo "Connection failed : " . $e->getMessage();
        }
    }

    protected function disconnect()
    {
    }

    protected function changeConnection()
    {
    }
}

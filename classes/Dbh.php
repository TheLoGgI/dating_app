<?php namespace Datingapp;
interface DbhInterface {} 
use Mysqli;
use Exception;

class Dbh
{  

    protected function connect() {
        try {
            $host = "localhost";
            $username = "root";
            $password = "password";
            $database = "dating";

            $dbh = new mysqli($host, $username, $password, $database);
            return $dbh;

        } catch(Exception $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }
    
}


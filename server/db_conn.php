<?php 

// $host = "localhost";
// $username = "root";
// $password = "password";
// $database = "dating";

// $mySQL = new mysqli($host, $username, $password, $database);

//     if ($mySQL->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//     }


class Dbh 
{  

    protected function connect($host) {
        try {
            $host = "localhost";
            $username = "root";
            $password = "password";
            $database = "dating";

            $dbh = new mysqli($host, $username, $password, $database);
            return $dbh;

        } catch(PDOException $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }
    
}


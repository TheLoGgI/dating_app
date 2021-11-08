<?php 

$host = "localhost";
$username = "root";
$password = "password";
$database = "dating";

$mySQL = new mysqli($host, $username, $password, $database);

    if ($mySQL->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }


   

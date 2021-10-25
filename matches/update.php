<?php
include_once('../server/db_conn.php');

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

// SELECT * FROM userview WHERE firstname LIKE 'l%';

if ($_SERVER["REQUEST_METHOD"] == "GET") { 

    // $action = $_GET['action'];
    $searchValue = $_GET['value'];

    // Query database 
    $sql = "SELECT * FROM userview WHERE firstname LIKE '%$searchValue%'";
    $result = $mySQL->query($sql);

    // Collect results
    $queryResults = [];
    while ($row = $result->fetch_object()) {
        array_push($queryResults, $row);
    }
    
    // construct response object
    $res = array(
        "statusText" => 'success',
        "status" => 200,
        "searchTerm" => $searchValue || 'null',
        "content" => $queryResults,
    );

    // send response
    echo json_encode($res);
    http_response_code(200);
    exit();

}



?>
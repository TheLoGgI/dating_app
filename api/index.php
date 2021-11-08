<?php namespace Datingapp;
include_once "../classes/API.php";

header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

$path = $_SERVER['REQUEST_URI'];

$API = new API(API::generateApiKey());

$res = array(
    "statusText" => 'failed request', 
    "status" => 404,
    "data" => null
);

if ($path === "/api/users") {
    $res = array(
        "statusText" => 'Success', 
        "status" => 200,
        "apikey" => $API->apikey,
        "data" => $API->users()
    );
}

if ($path === "/api/user/?") {
    $res = array(
        "statusText" => 'Success', 
        "status" => 200,
        "apikey" => $API->apikey,
        "data" => $API->user(1)
    );
}

http_response_code(200);
exit(json_encode($res));
<?php namespace Datingapp;
include_once "../classes/API.php";

header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');

function getQueryParam($queryparam) {
    if (isset($_GET[$queryparam])) {
        return $_GET[$queryparam];
    }

    if (isset($_POST[$queryparam])) {
        return $_POST[$queryparam];
    }
    
    return null;
}

function constructQuertString() {
    $args = func_get_args();

}

$path = $_SERVER['REQUEST_URI'];
$endPoints = array(
    'users' => '/api/users'
);

// var_dump(str_starts_with($path, $endPoints['users']), $endPoints['users']);
// query params
$id = getQueryParam('id'); 
$name = getQueryParam('name'); 
$age = getQueryParam('age'); 
$sex = getQueryParam('sex'); 



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

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // list($userQuery) = explode("/api/users/", $path);
    
    

    if (str_starts_with($path, $endPoints['users'])) {
        //  var_dump($name);
        // $query = substr($path, strlen($endPoints['users']));
        $query = '?';
        // // $query .= $id ? "id=$id" : '';
        $query .= $name ? "name=$name"  : '';
        // $query .= $age ? "age=$age"  : '';
        // $query .= $sex ? "sex=$sex"  : '';

        $res = array(
            "statusText" => 'Success', 
            "status" => 200,
            "apikey" => $API->apikey,
            "query" => $query,
            "data" => $API->users($name)
        );
    }

    // var_dump($res);
// }

http_response_code(200);
exit(json_encode($res));
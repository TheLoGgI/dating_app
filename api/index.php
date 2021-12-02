<?php namespace Datingapp;
include_once "../classes/API.php";

header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');


function getQueryParam($queryparam, &$queryStringParms = null) {
    
    if (isset($_GET[$queryparam])) {
        if (isset($queryStringParms)) $queryStringParms[$queryparam] = $_GET[$queryparam];
        return $_GET[$queryparam];
    }

    if (isset($_POST[$queryparam])) {
        if (isset($queryStringParms)) $queryStringParms[$queryparam] = $_POST[$queryparam];
        return $_POST[$queryparam];
    }
    
    return null;
}

function constructQuertString() {
    $args = func_get_args();

}

$path = $_SERVER['REQUEST_URI'];
$endPoints = array(
    'usersQuery' => '/api/users?',
    'users' => '/api/users'
);


// query params
$queryparams = [];
$id = getQueryParam('id', $queryparams); 
$name = getQueryParam('name', $queryparams); 
$age = getQueryParam('age', $queryparams); 
$sex = getQueryParam('sex', $queryparams);

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


if (str_starts_with($path, $endPoints['usersQuery'])) {
    // construct a query string to sent with the response
    $queryString = '?';
    $keys = array_keys($queryparams);
    for ($i = 0; $i < count($queryparams); $i++) {
        $key = $keys[$i];
        $value = $queryparams[$key];
        
        if (!$value) continue;
        if ($i === count($queryparams) - 1) {
            $queryString .= "$key=$value";
            break;
        }
        
        $queryString .= "$key=$value&";
        
    }

    // Verify query values
    $query = [];
    $genderArray = ['male', 'female', 'non-binary', 'other'];
    $query['id'] = intval($id) !== 0 && isset($id) ? intval($id) : 'null';
    $query['name'] = gettype($name) == 'string' && isset($name) ? $name : '';
    $query['age'] = intval($age) !== 0 && isset($age) ? intval($age) : 0;
    $query['sex'] = in_array($sex, $genderArray) ? "'$sex'" : 'null';
    $queryObject = json_decode(json_encode($query));
    
    $res = array(
        "statusText" => 'Success', 
        "status" => 200,
        "apikey" => $API->apikey,
        "query" => $queryString,
        "data" => $API->users($queryObject)
    );
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // list($userQuery) = explode("/api/users/", $path);
    


http_response_code(200);
exit(json_encode($res));
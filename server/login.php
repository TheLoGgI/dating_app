<?php namespace Datingapp;
session_start();

header('Content-Type: application/json');


include_once "../classes/User.php";

$data = json_decode(file_get_contents('php://input'));

$email = $data->email ?? null;
$password = $data->password ?? null;
$repassword = $data->repassword ?? null;
$firstname = $data->firstname ?? null;
$surname = $data->surname ?? null;
$city = $data->city ?? null;
$birthday = $data->birthday ?? null;
$sex = $data->sex ?? null;
$partnergender = $data->partnergender ?? null;

$user = new User($email, $password, $repassword, $firstname, $surname, $city, $birthday, $sex, $partnergender);

if ($user->status === "loggedin") {
    // User logged in
    $name = $_SESSION['current_user']->fullname;
    // header("location: /profil/?user=$name");
    $res = array(
        "statusText" => 'Success', 
        "status" => 200,
        "event" => 'loggedin',
        "user" => $user
    );
    http_response_code(200);
    
      // encode your PHP Object or Array into a JSON string.
      // stdClass or array
      // making sure nothing is added
    exit(json_encode($res));
}

if ($user->status === "signedup") {
    // User signed up
    // header("location: /login/?succes=usercreated");
    $res = array(
        "statusText" => 'Success', 
        "status" => 200,
        "event" => 'signedup',
        "user" => json_encode($user)
    );
    
}

if ($user->status === "error") {
    // User NOT signed up
    // header("location: /login/?failed=usercreated");
    $res = array(
        "statusText" => 'Error, Bad request',
        "event" => 'login', 
        "status" => 500,
        "user" => json_encode($user)
    );
    http_response_code(500);
    
      // encode your PHP Object or Array into a JSON string.
      // stdClass or array
      // making sure nothing is added
    exit(json_encode($res));
}




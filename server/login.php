<?php namespace Datingapp;
session_start();


include_once "../classes/User.php";
// include_once('db_conn.php');
var_dump($_POST);
print "<br>" . count($_POST) . "<br>"; 
// $email = mysqli_real_escape_string($mySQL, $_POST['email']);
// $password = mysqli_real_escape_string($mySQL, $_POST['password']);


$user = new User(...$_POST);
// var_dump($user);

// $sql = "SELECT userId FROM users 
//             WHERE email = '$email' AND password = MD5('$password')";
// $result = $mySQL->query($sql);

// if ($result->num_rows !== 0) {
//     $userInfo = $result->fetch_object(); // fetch object from database
//     $userId = intval($userInfo->userId); // convert userid to int

//     $userDetailsQuery = "SELECT * FROM userview WHERE userid = '$userId'"; // query for fetch userview
//     $userDetailsResult = $mySQL->query($userDetailsQuery);

//     if (isset($userDetailsResult)) {
//         $_SESSION['current_user'] = $userDetailsResult->fetch_object();
//         header("location: ../profil?user=$email");
//         exit;
//     } else {

//         // If profil don't exists
//         header("location: ../login/?user=create new user");
//         // $userDetailsResult = $mySQL->query("INSERT INTO profil VALUES ();");

//     }
// } else {
//     // wrong password or email
//     header("location: ../login/?user=wrong password or email");
//     exit;
// }

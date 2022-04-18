<?php

namespace Datingapp;

include "./server/db_conn.php";
include "classes/User.php";
// include "classes/UserView.php";
// use func_num_arg;
// use Datingapp\FormValidation;

// $json = file_get_contents('api/users');
// var_dump($json);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
  <title>Test</title>
</head>

<body>
  <?php

  // $user = new UserView();
  // $user = $user->init(5, "userview");
  // var_dump($user);
  // $uid = $user->getUserUid();
  // $sql = "CALL createUser('emilie@gmail.com', 'emiliepassword', 'emilie', 'emilie', 'Aarhus', '1994-01-10','male', 'Female')";
  // $sql = "CALL GetOfficeByCountry(5)";
  // $sql = "CALL createUser('$email', '$password', '$firstname', '$surname', '$city', '$birthday','$sex', '$partnergender')";
  $sql = "CALL searchUsers('', 0, null, NULL, 100, NULL);";
  $result = $mySQL->query($sql);
  // var_dump();



  // $string = "adsasddsa";
  // $int_value = intval($string);
  // echo $int_value . '<br>';
  // echo gettype($int_value);


  /************************************************************************************************************************ 
   *************************************************************************************************************************
   **************                                                                           ********************************
   **************           EXAMPLE FETCH -- array, assoc, object and all                   ********************************
   **************                                                                           ********************************
   *************************************************************************************************************************
   *************************************************************************************************************************/

  $array = $result->fetch_array(); // Fetch the next row as an associative, a numeric array or both 
  $assoc = $result->fetch_assoc(); // Fetch the next row as an associative array
  $object = $result->fetch_object(); // Fetch the next row as a an "class" object
  $all = $result->fetch_all(); // Fetch the next row as a an "class" object


  var_dump($all);
  print '<br>';
  print '<br>';
  print '<br>';
  var_dump($array);
  print '<br>';
  print '<br>';
  print '<br>';
  var_dump($object);
  print '<br>';
  print '<br>';
  print '<br>';
  var_dump($assoc);
  print '<br>';
  print '<br>';
  print '<br>';

  print "assoc " . $assoc['email'];
  print "array " . $array['email'];
  print "object " . $object->email;

  print '<br>';
  print '<br>';
  print '<br>';

  // Fetching data from the reserved json file and decoding to json format
  $jsonobj = file_get_contents('users.json');
  $users = json_decode($jsonobj, false); // true if returned in associative array
  var_dump($users);

  // print password_hash('katrine', PASSWORD_DEFAULT);

  // $userLoggedIn = $user->loginUser();

  print '<br>';
  print '<br>';
  print '<br>';

  // var_dump($_POST);
  // $user->loginUser();
  // $user->hasFields();


  /************************************************************************************************************************ 
   *************************************************************************************************************************
   **************  EXAMPLE SUPERGLOABLS -- GET, POST, SESSION and COOKIES                   ********************************
   **************  How do you implement them and what are the differences between the four? ********************************
   *************************************************************************************************************************
   *************************************************************************************************************************/

  // GET - $_GET
  $firstname = $_GET['firstname'];
  $_GET['fullname'] = 'Ivan Peterson';
  print $firstname;


  // POST - $_POST
  $middlename = $_POST['middlename'];

  // SESSION - $_SESSION
  session_start(); // made in the top of the file/document
  $_SESSION['lastname'] = 'Peterson';
  $lastname = $_SESSION['lastname'];

  // COOKIES - $_COOKIES
  setcookie("user", json_encode($user), time() + 3600);
  $user = $_COOKIE['user'];
  $profession = $user['profession'];


  print <<<EOD
    <p> My name is $firstname $middlename $lastname and I am a $profession </p>
  EOD;



  /************************************************************************************************************************ 
   *************************************************************************************************************************
   **************                                                                           ********************************
   **************                               EXAMPLE Encryption -- md5                   ********************************
   **************                                                                           ********************************
   *************************************************************************************************************************
   *************************************************************************************************************************/

  $str = 'kasper fisher';
  $encrptedStr = md5($str);
  print $encrptedStr; // 1d6367b01860661e0f231c16ac24d1b7 - Returns the hash as a 32-character hexadecimal number.

  ?>

  <main class="mx-auto mt-4 px-40">

    <table class="table-auto">
      <thead>
        <tr>
          <th>ID</th>
          <th>Full name</th>
          <th>Age</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($obj = $result->fetch_object('stdClass')) {
        ?>
          <tr class="bg-emerald-200">
            <td><?php print $obj->userId; ?></td>
            <td><?php print $obj->fullname; ?></td>
            <td><?php print $obj->age; ?></td>
          </tr>
        <?php } ?>


      </tbody>
    </table>


  </main>
  <script>
    fetch('api/users').then(res => res.json()).then(data => {
      console.log('data: ', data);
    })
  </script>
</body>

</html>
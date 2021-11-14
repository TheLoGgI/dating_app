<?php namespace Datingapp;
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



$string = "adsasddsa";
$int_value = intval($string);
echo $int_value . '<br>';
echo gettype($int_value);



// var_dump($result);
// var_dump($result->fetch_object());
// var_dump($result->fetch_all());

// print password_hash('katrine', PASSWORD_DEFAULT);

// $userLoggedIn = $user->loginUser();


// var_dump($_POST);
// $user->loginUser();
// $user->hasFields();

// test();
// print <<<EOD

// EOD;


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
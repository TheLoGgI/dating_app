<?php
    include_once('db_conn.php');
    function split($string) {
        $result = [];
        $token = strtok($string,'-');
        while ($token !== false) {
        array_push($result, $token);
        $token = strtok("-");
        }
        return $result;
    }

    function formatBirthday($birthArray) {
        return "19$birthArray[2]-$birthArray[1]-$birthArray[0]";
    }

    $sex = $_POST['sex'];
    $partnersex = $_POST['partnersex'];

    $birthday = formatBirthday(split($_POST['birthday']));

    $city = $_POST['city'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];

    $email = $_POST['newemail'];
    $password = $_POST['newpassword'];

    $sql = "CALL createUser('$email', '$password', '$firstname', '$surname', '$city', '$birthday','$sex', '$partnersex')";
    $result = $mySQL->query($sql);
    if (!$result) {
        header("location: ../login/?user_created=0");
        exit;
    } else {
        header("location: ../login/?user_created=1");
        exit;
        
    }

?>
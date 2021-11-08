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
        return "$birthArray[2]-$birthArray[1]-$birthArray[0]";
    }

    $sex = $_POST['sex'];
    $partnersex = $_POST['partnergender'];

    $birthday = formatBirthday(split($_POST['birthday']));

    $city = $_POST['city'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];

    $email = $_POST['newemailforminput'];
    $password = $_POST['newpasswordforminput'];
    $hasedPassoword = password_hash("lasse", PASSWORD_DEFAULT);
    // **NOTE**: hash password missing

    $sql = "CALL createUser('$email', '$hasedPassoword', '$firstname', '$surname', '$city', '$birthday','$sex', '$partnersex')";
    $result = $mySQL->query($sql);
    // var_dump($sql);
    // var_dump($result);
    if (!$result) {
        header("location: ../login?user_created=0");
        exit;
    } else {
        header("location: ../login?user_created=1");
        exit;
        
    }

?>
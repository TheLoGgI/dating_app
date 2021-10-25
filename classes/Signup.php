<?php namespace Datingapp;
include_once "Dbh.php";
include_once "Util.php";
// use classes\Util\UtilityInterface;
// include_once("Dbh.php");

class Signup extends Dbh implements UtilityInterface{
    
    // Check user already exits
    protected function checkUser($uid) {
        $dbConnection = $this->connect();
        $query = "SELECT userId FROM users WHERE email = $this->email OR userId = $uid";
        $result = $dbConnection->query($query);

        $resultCheck = false;
        if ($result->num_rows == 0) {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    public function split($string) {
        $result = [];
        $token = strtok($string,'-');
        while ($token !== false) {
            array_push($result, $token);
            $token = strtok("-");
        }
        return $result;
    }

    public function formatBirthday($birthArray) {
        return "19$birthArray[2]-$birthArray[1]-$birthArray[0]";
    }

}

    // include_once('db_conn.php');


    // $sex = $_POST['sex'];
    // $partnersex = $_POST['partnersex'];

    // $birthday = formatBirthday(split($_POST['birthday']));

    // $city = $_POST['city'];
    // $firstname = $_POST['firstname'];
    // $surname = $_POST['surname'];

    // $email = $_POST['newemail'];
    // $password = $_POST['newpassword'];

    // $sql = "CALL createUser('$email', '$password', '$firstname', '$surname', '$city', '$birthday','$sex', '$partnersex')";
    // $result = $mySQL->query($sql);
    // if (!$result) {
    //     header("location: ../login/?user_created=0");
    //     exit;
    // } else {
    //     header("location: ../login/?user_created=1");
    //     exit;
        
    // }

?>
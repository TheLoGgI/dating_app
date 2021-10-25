<?php namespace Datingapp;

include "Dbh.php";
// interface FormValidationInterface {
//     public function hasEmptyInputs();
//     public function passwordMatch(); 
//     public function invalidUid();

// }

/**
 * 
 */
trait TraitName
{
    
}


abstract class UserModel extends Dbh
{
    protected function hasUser($uid) {
        $dbConnection = $this->connect();
        $query = "SELECT userId FROM users WHERE email = '$this->email' OR userId = '$uid'";
        $result = $dbConnection->query($query);

        $resultCheck = false;
        if ($result->num_rows == 0) {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    protected function getCurrentUser($uid) {
        $dbConnection = $this->connect();
        $userDetailsQuery = "SELECT * FROM userview WHERE userid = '$uid'"; // query for fetch userview
        $userDetailsResult = $dbConnection->query($userDetailsQuery);
        if ($userDetailsResult->num_rows === 1) {
            return $userDetailsResult->fetch_object();
        }

        return $userDetailsResult;
    }

    protected function checkPassword($userId) {
        $dbConnection = $this->connect();
        $uid = intval($userId);
        $query = "SELECT password FROM users WHERE userId = '$uid'";
        $result = $dbConnection->query($query);
        
        $dbHashedPassword = $result->fetch_object();
        // var_dump($dbHashedPassword, $this->password);
        return password_verify($this->password, $dbHashedPassword->password);
    }

    protected function getUid() {
        $dbConnection = $this->connect();
        $query = "SELECT userId FROM users WHERE email = '$this->email'";
        $result = $dbConnection->query($query);
        if ($result->num_rows == 1) {
            return $result->fetch_object()->userId;
        }

        return $result;
    }

    /**
    * Signs up a user
    *  @param email string - email
    *  @param Email String
    *  @param passsword String
    *  @param repassword String
    *  @param firstname String
    *  @param surname String
    *  @param city String
    *  @param birthday String yyyy-mm-dd
    *  @param sex String
    *  @param partnergender String
     * @return Boolean true if everything went OK, else false.
     */ 
    protected function signUpUser($email, $password, $repassword, $firstname, $surname, $city, $birthday, $sex, $partnergender) {
        $dbConnection = $this->connect();
        $sql = "CALL createUser('$email', '$password', '$firstname', '$surname', '$city', '$birthday','$sex', '$partnergender')";
        $result = $dbConnection->query($sql);

        if ($result->num_rows == 1) {
            return true;
            exit();
        }

        return false;
        exit();
    }

    protected function sendConfirmationEmail() {

    }
}
<?php namespace Datingapp;

include "FormValidation.php";

// use Datingapp\FormValidation as FormValidation;
use Exception;
use Requests;
use Requests_Auth;

interface UserInterface {
    public function getUserUid(); 
    public function loginUser(); 
    public function signoutUser(); 
}


abstract class UserController extends FormValidation implements UserInterface {

    // private user data
    protected $password;
    protected $repassword;
    
    // Public User data
    public $uid;
    public $sex;
    public $partnerGender;
    public $birthday;
    public $city;
    public $firstname;
    public $surname;
    public $email;


    /**
    *  @param Email {String}
    *  @param passsword {String}
    *  @param repassword {String}
    *  @param firstname {String}
    *  @param surname {String}
    *  @param city {String}
    *  @param birthday {String} - format needed yyyy-mm-dd
    *  @param sex {string}
    *  @param partnergender {string}
    */
    function __construct($email, $password, $repassword, $firstname, $surname, $city, $birthday, $sex, $partnergender) {

        $validArgumentsCount = $this->countValidArguments();

        if ($validArgumentsCount > 2) {
            $response = $this->registerUser($email, $password, $repassword, $firstname, $surname, $city, $birthday, $sex, $partnergender);
            // return $this;
            print "new user regisert" . $response;
            exit();
        } 

        $this->email = $email;
        $this->password = $password;
        $this->loginUser();
        print "user logged In";
        // $this->repassword = $repassword;
        // $this->firstname = $firstname;
        // $this->surname = $surname;
        // $this->city = $city;
        // $this->birthday = $birthday;
        // $this->sex = $sex;
        // $this->partnerGender = $partnergender;

    } 

    public function getUserUid() {
        return $this->uid;
    }

    function req($request) {
        print $request;
    }

    public function loginUser() {

        $hasValidInputs = $this->hasEmptyInputs($this->email, $this->password);

        if ($hasValidInputs === false) {    
            // All inputs is filled;
            $isValidEmail = $this->validateEmail();
            
            if ($isValidEmail) {
                $userUid = $this->getUid();
                $isCorrectPassword = $this->checkPassword($userUid->userId);

                if ($isCorrectPassword) {
                    $currentUser = $this->getCurrentUser($userUid);
                    $_SESSION['current_user'] = $currentUser;
                    return true;
                }
                
                $_SESSION['current_user'] = null;
                return new Exception("Invalid password");

            }

            $_SESSION['current_user'] = null;
            return new Exception("Invalid email");
        }

        $_SESSION['current_user'] = null;
        return new Exception("Invalid inputs");
        
    }

    /**
    * Register a new user
    *  @param Email String
    *  @param passsword String
    *  @param repassword String
    *  @param firstname String
    *  @param surname String
    *  @param city String
    *  @param birthday String yyyy-mm-dd
    *  @param sex String
    *  @param partnergender String
    */
    private function registerUser($email, $password, $repassword, $firstname, $surname, $city, $birthday, $sex, $partnergender) {
        $hasValidInputs = $this->hasEmptyInputs();
        $isPasswordEquel = $this->validatePassword($password, $repassword);
        // print $birthday;
        // $isValidBirthday = $this->validateBirthday($birthday);
        $birthday = $this->formatBirthday($birthday);

        if ($hasValidInputs === false && $isPasswordEquel) {    
            // All inputs is filled;
            $isValidEmail = $this->validateEmail();
            if ($isValidEmail) {

                $response = $this->signUpUser($email, $password, $repassword, $firstname, $surname, $city, $birthday, $sex, $partnergender);
                
                if ($response) {
                    return true;
                }

                return false;
                

            }
        }


    }
    



    

    public function signoutUser() {
        session_start();

        session_unset();
        session_destroy();

        $url = "http://localhost:3000/login/";

        header("Location: $url?msg=user logged out");
    }

    

}
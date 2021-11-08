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
    private $uid;
    
    // Public User data
    public $status;
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
        $args = func_get_args();
        $validArgumentsCount = $this->countValidArguments(...$args);

        $this->email = $email;
        $this->password = $password;

        if ($validArgumentsCount > 2) {

            $response = $this->registerUser($email, $password, $repassword, $firstname, $surname, $city, $birthday, $sex, $partnergender);
            var_dump($response);
            exit('userRegister');
        } 

        
        // $this->loginUser();

    } 

    public function getUserUid() {
        return $this->uid;
    }

    public function loginUser() {

        $hasValidInputs = $this->hasEmptyInputs($this->email, $this->password);

        if ($hasValidInputs === false) {    
            // All inputs is filled;
            $isValidEmail = $this->validateEmail();
            
            if ($isValidEmail) {
                $userUid = $this->getUid();
                $isCorrectPassword = $this->checkPassword($userUid);

                if ($isCorrectPassword) {
                    $currentUser = $this->getUser($userUid);
                    if ($currentUser !== false) {
                        foreach ($currentUser as $key => $value){
                                $this->{$key} = $value;
                        }
                    }
                    // var_dump($this);
                    // $this = $currentUser;
                    $_SESSION['current_user'] = $currentUser;
                    $this->status = "loggedin";
                    $this->password = null;
                    return true;
                }
                
                $_SESSION['current_user'] = null;
                $this->status = "error";
                return new Exception("Invalid password");

            }

            $_SESSION['current_user'] = null;
            $this->status = "error";
            return new Exception("Invalid email");
        }

        $_SESSION['current_user'] = null;
        $this->status = "error";
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
    public function registerUser($email, $password, $repassword, $firstname, $surname, $city, $birthday, $sex, $partnergender) {
        $args = func_get_args();
        $hasValidInputs = $this->hasEmptyInputs(...$args);

        $isPasswordEquel = $this->validatePassword($password, $repassword);
        // $formtedbirthday = $this->formatBirthday($birthday);

        if ($hasValidInputs === false && $isPasswordEquel) {    
            // All inputs is filled;
            $isValidEmail = $this->validateEmail();
            if ($isValidEmail) {
                
                $response = $this->signUpUser($email, $password, $firstname, $surname, $city, $birthday, $sex, $partnergender);
                if ($response) {
                    $this->status = "signedup";
                    return true;
                }

                return false;
                

            }
        }

        // Else feedback
            // nothing happend


    }
    



    

    public function signoutUser() {
        session_start();

        session_unset();
        session_destroy();

        $url = "http://localhost:3000/login";

        header("Location: $url?msg=user logged out");
    }

    

}
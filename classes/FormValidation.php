<?php namespace Datingapp;

include "UserModel.php";
include "Util.php";

class FormValidation extends UserModel 
{
    use utillityDatabaseFormat;

    /**
     * Check for empty inputs
     * @return {Boolean} True if fields are empty, false otherwise.
     */ 
    protected function hasEmptyInputs()
    {
        $args = func_get_args();
        if (count($args) === 0) {
            $args = get_object_vars($this);
        }

        $i = 0;

        while (count($args) > $i) {
            if (empty($args[$i])) {
                return true; 
            }
            $i++;
        }
    
        return false;
    }

    /**
     * Check for valid email format
     * @return {Boolean} true if email is valid, false otherwise.
     */ 
    protected function validateEmail() {
        // https://www.w3schools.com/php/php_form_url_email.asp
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    /**
     * Check for valid birthday format
     * @return {Boolean} true if birthday is valid, false otherwise.
     */ 
    protected function validateBirthday($birthday) {
        // check for correct
        if (isset($birthday)) return true;
        return false;
    }

    /**
     * Check if password and re-password is equel
     * @return {Boolean} true if both are the same, false otherwise.
     */ 
    protected function validatePassword($password = '', $repassword = '') {
        if (isset($password) && isset($repassword)) {
            return $password === $repassword;
        } 

        return $this->password === $this->repassword; 
        
    }

    // protected function split($string) {
    //     $result = [];
    //     $token = strtok($string,'-');
    //     while ($token !== false) {
    //         array_push($result, $token);
    //         $token = strtok("-");
    //     }
    //     return $result;
    // }

    // protected function formatBirthday($string) {
    //     $parts = $this->split($string);
    //     return "19$parts[2]-$parts[1]-$parts[0]";
    // }

    protected function countValidArguments() {
        $args = func_get_args();
        $countValid = 0;
        // In order to be able to directly modify array elements within the loop precede $value with &. - Variable by value
        foreach ($args as $value) {
            if (isset($value)) $countValid++;
        }
        return $countValid;
    }

    // public function __call($name, $arguments)
    // {
    //     if (str_starts_with($name, 'util')) {
    //         $this->utillity = new Util();
            
    //         if (str_ends_with($name, 'split')) {
    //             $this->utillity->split($arguments);
    //         }
            
    //         if (str_ends_with($name, 'formatBirthday')) {
    //             $this->utillity->formatBirthday($arguments);
    //         }

    //     }
    // }
}


    


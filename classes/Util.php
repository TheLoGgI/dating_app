<?php namespace Datingapp;

interface UtilityInterface {
    public function split($string);
    public function formatBirthday($birthdayArray);
}

class Util implements UtilityInterface {

    public function split($string) {
        $result = [];
        $token = strtok($string,'-');
        while ($token !== false) {
            array_push($result, $token);
            $token = strtok("-");
        }
        return $result;
    }

    function formatBirthday($string) {
        $parts = $this->split($string);
        return "19$parts[2]-$parts[1]-$parts[0]";
    }
    
}
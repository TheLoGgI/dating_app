<?php namespace Datingapp;
include_once "UserController.php";


class User extends UserController
{
    public function __construct($email, $password, $repassword = null, $firstname = null, $surname = null, $city = null, $birthday = null, $sex = null, $partnergender = null) {
        parent::__construct($email, $password, $repassword, $firstname, $surname, $city, $birthday, $sex, $partnergender);

    }

    


}

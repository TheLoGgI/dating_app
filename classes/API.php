<?php namespace Datingapp;

include_once "UserModel.php";



class API extends UserModel
{
    
    public function __construct($apikey) {
        $this->apikey = $apikey;

        if (!$apikey) {
            exit("wrong key");
        }
    }

    public function users() {
        // var_dump($this->getAllUsers());
        return $this->getAllUsers();
        // return array(
        //     "statusText" => 'success, email sendt', 
        //     "status" => 200,
        // );
    }

    public function user($uuid) {
        return $this->getUser($uuid);
    }

    public static function generateApiKey() {
        return uniqid(rand(1, 99999));
    }

    


}

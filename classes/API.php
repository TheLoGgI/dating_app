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

    public function users($query = null, $limit = 100) {
        if (!empty($query)) {
            return $this->queryUsers($query, $limit);
        }

        return $this->getAllUsers();
    }

    public function user($uuid) {
        return $this->getUser($uuid);
    }

    public static function generateApiKey() {
        return uniqid(rand(1, 99999));
    }

    public static function getQueryParam($queryparam) {
        if (isset($_GET[$queryparam])) {
            return $_GET[$queryparam];
        }
    
        if (isset($_POST[$queryparam])) {
            return $_POST[$queryparam];
        }
        
        return null;
    }

    


}

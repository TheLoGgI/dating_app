<?php

namespace Datingapp;

trait utillityDatabaseFormat
{

    function split($string)
    {
        $result = [];
        $token = strtok($string, '-');
        while ($token !== false) {
            array_push($result, $token);
            $token = strtok("-");
        }
        return $result;
    }

    function formatBirthday($string)
    {
        $parts = $this->split($string);
        return "$parts[2]-$parts[1]-$parts[0]";
    }
}


class utillityFunctions
{

    static function split($string)
    {
        $result = [];
        $token = strtok($string, '-');
        while ($token !== false) {
            array_push($result, $token);
            $token = strtok("-");
        }
        return $result;
    }

    // static function formatBirthday($string)
    // {
    //     $parts = $this->split($string);
    //     return "$parts[2]-$parts[1]-$parts[0]";
    // }
}

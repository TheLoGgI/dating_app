<?php namespace Datingapp;
include_once("db_conn.php");
include_once("../classes/File.php");


class User
{
    private $firstname;
    private $surname;
    private $email;
    private $sex;
    private $partnerSex;
    private $city;
    private $country;
    private $proffession;
    private $description;
    private $profilImage;
}

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

function formatBirthday($birthArray)
{
    return "$birthArray[2]-$birthArray[1]-$birthArray[0]";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $userid = intval($_POST['userid']);
    $profilId = intval($_POST['profilid']);
    $email = $_POST['email'];
    $editfirstname = $_POST['editfirstname'];
    $editsurname = $_POST['editsurname'];
    $editsex = $_POST['editsex'];
    $editpartnersex = $_POST['editpartnersex'];
    $editbirthday = formatBirthday(split($_POST['editbirthday']));
    $editdescription = $_POST['editdescription'];
    $editcity = $_POST['editcity'];
    $editcounty = $_POST['editcounty'];
    $editproffession = $_POST['editproffesion'];
    $profilImage = null;


    if (!empty($_FILES['profilImage'])) {

        $profilImage = new File($_FILES['profilImage'], "../uploads/profil/profilImage$userid-$editfirstname");
        $isUploaded = $profilImage->upload();

        $userDetailsQuery = "SELECT * FROM userview WHERE userid = '$userid' AND email = '$email'"; // query for fetch userview
        $userDetailsResult = $mySQL->query($userDetailsQuery);

        if ($userDetailsResult->num_rows === 1 && $isUploaded) {
            $profilImaggeLocation = $profilImage->getFileLocation();

            $updateUserQuery = "CALL updateUser($profilId, '$email', '$editfirstname', '$editsurname', '$editsex', '$editpartnersex', '$editdescription', '$editcity', '$editcounty','$editbirthday', '$editproffession', '$profilImaggeLocation');";
            $updateUserResult = $mySQL->query($updateUserQuery);
            header("location: ../profil/success");
        } else {
            $profilImage->deleteFile();
            header("location: ../profil?profil not updated");
        }
        
        
    } else {
        print "Profil image not uploaded";
        header("location: ../profil?profil image not updated");
    }
    
}

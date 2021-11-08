<?php namespace Datingapp;
include_once("db_conn.php");
include_once("../classes/File.php");

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
    $email = $_POST['email'];
    $editfirstname = $_POST['editfirstname'];
    $editsurname = $_POST['editsurname'];
    $editsex = $_POST['editsex'];
    $editpartnersex = $_POST['editpartnersex'];
    $editbirthday = formatBirthday(split($_POST['editbirthday']));
    $editdescription = trim($_POST['editdescription']);
    $editcity = $_POST['editcity'];
    $editcounty = $_POST['editcounty'];
    $editproffession = $_POST['editproffesion'];
    $profilImage = null;


    $userDetailsQuery = "SELECT * FROM userview WHERE userid = '$userid' AND email = '$email'"; // query for fetch userview
    $userDetailsResult = $mySQL->query($userDetailsQuery);
    $userObject =  $userDetailsResult->fetch_object();
    // var_dump($_FILES['profilImage']);
    // var_dump(isset($_FILES['profilImage']['tmp_name']));
    if (isset($_FILES['profilImage']['tmp_name'])) {

        $profilImage = new File($_FILES['profilImage'], "../uploads/profil/profilImage$userid-$editfirstname");
        
        if ($userDetailsResult->num_rows === 1 && $profilImage->status) {
            $profilImaggeLocation = $profilImage->location;

            $updateUserQuery = "CALL updateUser($userid, '$email', '$editfirstname', '$editsurname', '$editsex', '$editpartnersex', '$editdescription', '$editcity', '$editcounty','$editbirthday', '$editproffession', '$profilImaggeLocation');";
            $updateUserResult = $mySQL->query($updateUserQuery);
            header("location: ../profil/success");
        } else {
            $updateUserQuery = "CALL updateUser($userid, '$email', '$editfirstname', '$editsurname', '$editsex', '$editpartnersex', '$editdescription', '$editcity', '$editcounty','$editbirthday', '$editproffession', '$userObject->profilImage');";
            $updateUserResult = $mySQL->query($updateUserQuery);
            header("location: ../profil?profil not updated");
        }
        
        
    } else {
        // Update other information
        $updateUserQuery = "CALL updateUser($userid, '$email', '$editfirstname', '$editsurname', '$editsex', '$editpartnersex', 'COUNT COOUNT CONUNT CONUNT OCNOTUN CONOCHEO ONDONIU', '$editcity', '$editcounty','$editbirthday', '$editproffession', '$userObject->profilImage');";
        $updateUserResult = $mySQL->query($updateUserQuery);
        header("location: ../profil?profil image not updated");
    }
    
}

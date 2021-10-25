<?php namespace Datingapp;
include "classes/User.php";
// use func_num_arg;
// use Datingapp\FormValidation;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <title>Test</title>
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<?php

$user = new User("katrine@gmail.com", "katrine", "katrine", "firstname", "surname", "city", "birthday", "gender", "partnergender");
$uid = $user->getUserUid();

// print password_hash('katrine', PASSWORD_DEFAULT);

// $userLoggedIn = $user->loginUser();


// var_dump($_POST);
// $user->loginUser();
// $user->hasFields();

// test();
print <<<EOD

EOD;

?>

<form action="?" method="POST" class="w-3/4 grid grid-cols-1 gap-8">
                    <h1 class="text-5xl font-bold text-primary text-white text-center">Sign up</h1>
                    <div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <select class="text-2xl bg-gray-100 p-2 w-full" name="sex" id="sexforminput">
                                <option value="" selected disabled hidden>Dit køn</option>
                                <option value="male">Mand</option>
                                <option value="female">Kvinde</option>
                                <option value="non-binary">non-binær</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <select class="text-2xl bg-gray-100 p-2 w-full" name="partnersex" id="sexofpartnerforminput" autocomplete="sex">
                                <option value="" selected disabled hidden>Køn partner du søger</option>
                                <option value="male">Mand</option>
                                <option value="female">Kvinde</option>
                                <option value="non-binary">non-binær</option>
                                <option value="biseksual">biseksual</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="text" name="birthday" id="birthdayforminput" autocomplete="bday" placeholder=" " value="27-10-96" required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="birthdayforminput">Fødselsdag (dd-mm-åå)</label>
                        </div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="text" name="city" id="cityforminput" autocomplete="bday" value="aalborg" placeholder=" " required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="cityforminput">By</label>
                        </div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="text" name="firstname" id="firstnameforminput" autocomplete="name" value="katrine" placeholder=" " required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="firstnameforminput">Fornavn</label>
                        </div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="text" name="surname" id="surnameforminput" autocomplete="bday" value="koll" placeholder=" " required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="surnameforminput">Efternavn</label>
                        </div>
                    </div>

                    <div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="email" name="newemail" id="newemailforminput" autocomplete="email" value="katrine@gmail.com" placeholder=" " required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="newemailforminput">Email</label>
                        </div>

                        <div class="input-field relative p-2 text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="password" name="newpassword" id="newpasswordforminput" autocomplete="new-password" value="katrine" placeholder=" " required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="newpasswordforminput">Kodeord</label>
                        </div>
                        <div class="input-field relative p-2 text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="password" name="repassword" id="repasswordforminput" autocomplete="new-password" value="katrine" placeholder=" " required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="repasswordforminput">Gentag kodeord</label>
                        </div>
                    </div>
                    <input type="submit" class="bg-primary hover:bg-hover-primary cursor-pointer text-white max-w-min justify-self-center text-2xl rounded-full px-16 py-2 filter drop-shadow-lg" value="SIGN UP">
                </form>

    <script type="text/javascript" src="main.js"></script>
</body>
</html>
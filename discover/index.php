
<?php
    include_once "../classes/API.php";
    use Datingapp\API;

    $API = new API(API::generateApiKey());
    $users = $API->users();
    // var_dump($users);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <base href="../">
    <meta name="author" content="" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <title>Matches page | Meeting</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="profil/style.profil.css" rel="stylesheet" />
</head>

<body>
    <?php include_once("../components/header.php") ?>

    <section class="w-100 m-auto">
        <div class="grid grid-cols-5 gap-4 content-container max-w-screen-lg mx-auto mt-2">
            <?php
                foreach($users as $user) {
            ?>
            <a href="<?php print "/profil?uuid=$user->userId"; ?>">
                <div class="hover:bg-gray-200 p-2 cursor-pointer">
                    <img class="rounded-md inline border-2 border-primary-tint" width="200" height="200" src="<?php
                    print $user->profilImage;
                    ?>" alt="profil image">
                    <div class="mt-2">
                        <p class="font-bold text-lg text-black"><?php
                            print $user->fullname;
                        ?></p>
                        <p class="text-lg text-black"><?php
                            print "$user->age years old"
                        ?></p>
                        <p class="text-lg text-black"><?php
                            print $user->city;
                        ?></p>
                    </div>
                </div>
            </a>
            <?php
                }
            ?>
            
        </div>
    </section>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <title>Meeting</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>

    <?php

    // Fetching data from the reserved json file and decoding to json format
    $jsonobj = file_get_contents('users.json');
    $users = json_decode($jsonobj, true);

    // Creating a Person object, with a constructor function
    class Person
    {

        // Static class property, for Person instances
        public static $instances = [];

        // Constructor functions, runs on instance creation, with perameters.
        function __construct($userid, $username, $birth, $gender, $postcode)
        {
            $this->id = $userid;
            $this->name = $username;
            $this->birth = $birth;
            $this->gender = $gender;
            $this->postcode = $postcode;

            array_push(Person::$instances, $this);
        }

        // Static metode to find the current user
        static function GetUser($id)
        {
            foreach (Person::$instances as $user) {
                if ($user->id == $id) {
                    return $user;
                }
            }
        }

        // Methode for finded mateces of each Person, saved on the matches prop, for the Person
        function FindMatches()
        {
            $isMatchingArray = [];

            foreach (Person::$instances as $user) {
                if ($user->id !== $this->id) {

                    $diffrenceDate = date_diff(date_create($this->birth), date_create($user->birth));
                    $daysDiff = $diffrenceDate->format("%a") / 365.25;

                    if ($daysDiff <= 2 && $user->gender !== $this->gender) {
                        array_push($isMatchingArray, $user);
                    }
                }
            }

            $this->matches = $isMatchingArray;
        }
    }

    // Creating users from json formated data
    foreach ($users as $user) {
        new Person(
            $user['userId'],
            $user['name'],
            $user['birth'],
            $user['gender'],
            $user['postcode']
        );
    }

    ?>

    <?php include_once("components/header.php") ?>
    <!-- HTML Documuent -->
    <section class="mx-auto mt-4 px-40">
        <h1 class="text-6xl font-bold text-blue-600 my-6">Online Users</h1>
        <div class="grid grid-rows-3 grid-flow-col gap-4">

            <!-- Rendering "online users", every user in json file -->
            <?php foreach (Person::$instances as $person) {
                echo "
                <a href='?id={$person->id}' class='bg-gray-200 p-2 hover:bg-blue-400'>
                        <div class='text-2xl font-bold'>{$person->name}</div>
                        <div>{$person->postcode}</div>
                        <div>{$person->birth}</div>
                        <div>{$person->gender}</div>
                </a>
            ";
            }
            ?>

        </div>

    </section>

    <section class="mx-auto mt-4 px-40">

        <?php
        // Check if we have an current user, and find it from the Persons object static methode
        // Also finding the matches for the user
        if (!empty($_GET['id'])) {
            $currentUser = Person::GetUser($_GET['id']);
            $currentUser->FindMatches();

        ?>
            <h2 class="text-4xl font-bold text-blue-600 my-6">Selected User</h2>
            <!-- Rendering the current users information, and adding number of matches -->
            <table class="table-auto w-1/5">
                <thead>
                    <tr class="text-blue-600 text-left">
                        <th>Property</th>
                        <th>Person</th>
                    </tr>
                </thead>
                <?php echo "<tr class='bg-blue-200'>
                            <td>Name</td>
                            <td>{$currentUser->name}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{$currentUser->gender}</td>
                        </tr>
                        <tr class='bg-blue-200'>
                            <td>Postal code</td>
                            <td>{$currentUser->postcode}</td>
                        </tr>
                        <tr >
                            <td>Birth</td>
                            <td>{$currentUser->birth}</td>
                        </tr>
                        <tr class='bg-blue-200'>
                            <td>Matches</td>
                            <td>" . count($currentUser->matches) . "</td>
                        </tr>";

                ?>
            </table>

            <section class="mx-auto mt-4 px-40">
                <div class="flex p-4 flex-grow w-full max-w-screen-xl justify-between">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="text-blue-600 text-left">
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Postal code</th>
                                <th>Birthday</th>
                            </tr>
                        </thead>

                        <?php
                        // Rendering matches for the current user
                        foreach ($currentUser->matches as $match) {
                            echo "<tr class='hover:bg-gray-400 py-4'>
                                <td>{$match->name}</td>
                                <td>{$match->gender}</td>
                                <td>{$match->postcode}</td>
                                <td>{$match->birth}</td>
                            </tr>";
                        }
                        ?>

                    </table>
                </div>
            </section>

        <?php
        } // Ending parentheses of if
        ?>



    </section>
</body>

</html>
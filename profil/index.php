<?php
// include_once('fileUpload.php');
session_start();
$user = $_SESSION["current_user"];
// var_dump($user);

if (!$user) {
    header("Location: ../login/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <base href="../">
    <meta name="author" content="" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <title>Profil page | Meeting</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="../style.global.css" rel="stylesheet" />
    <link href="profil/style.profil.css" rel="stylesheet" />
</head>

<body>
    <div id="shadowBlur" class="shadowblur fixed hidden w-full h-full backdrop-filter z-10 backdrop-blur-sm backdrop-brightness-75"></div>
    <?php include_once("../components/header.php") ?>

    <div id="editModal" class="editmodal hidden absolute w-1/3 h-auto bg-white z-10 rounded-md p-4">
        <form class="grid grid-cols-5 gap-x-14" action="../server/editUser.php" method="post" enctype="multipart/form-data">
            <div class="col">
                <div class="mt-4">
                    <label for="profilImage" class="group cursor-pointer w-40 h-40 inline-block relative rounded-full overflow-hidden text-black">
                        <div class="hover-edit bg-black group-hover:opacity-60 opacity-0 w-full h-full absolute text-white text-center text-xl pt-14">Edit</div>
                        <img src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="person" width="200" height="200">
                    </label>
                    <input class="hidden" type="file" name="profilImage" id="profilImage">
                </div>
            </div>
            <div class="col col-span-4">
                <input type="hidden" name="userid" id="userid" value="<?php
                                                                        print $user->userId;
                                                                        ?>">
                <input type="hidden" name="profilid" id="profilid" value="<?php
                                                                    print $user->profilId;
                                                                    ?>">
                <input type="hidden" name="email" id="email" value="<?php
                                                                    print $user->email;
                                                                    ?>">
                <div class="flex flex-col mt-4">
                    <label class="text-lg" for="editfirstname">Firstname</label>
                    <input class="bg-gray-100 p-2" type="text" name="editfirstname" id="editfirstname" value="<?php print $user->firstName; ?>">
                </div>
                <div class="flex flex-col mt-4">
                    <label class="text-lg" for="editsurname">Surname</label>
                    <input class="bg-gray-100 p-2" type="text" name="editsurname" id="editsurname" value="<?php print $user->surname; ?>">
                </div>
                <div class="flex flex-col mt-4">
                    <label class="text-lg" for="editsex">Sex</label>
                    <input class="bg-gray-100 p-2" type="text" name="editsex" id="editsex" value="<?php print $user->sex; ?>">
                </div>
                <div class="flex flex-col mt-4">
                    <label class="text-lg" for="editpartnersex">Sex of partner</label>
                    <input class="bg-gray-100 p-2" type="text" name="editpartnersex" id="editpartnersex" value="<?php print $user->partnerSex; ?>">
                </div>
                <div class="flex flex-col mt-4">
                    <label class="text-lg" for="editbirthday">Birthday (dd-mm-yyyy)</label>
                    <input class="bg-gray-100 p-2" type="text" pattern="\d{2}-\d{2}-\d{4}" title="day-month-year" name="editbirthday" id="editbirthday" value="<?php
                                                                                                                                                                $date = new DateTime($user->birthday);
                                                                                                                                                                print $date->format('d-m-Y'); ?>">
                </div>
            </div>
            <div class="col col-start-2 col-span-4">
                <div class="flex flex-col mt-4">
                    <label class="text-lg" for="editdescription">Description</label>
                    <textarea class="bg-gray-100 p-2" rows="5" cols="33" type="text" name="editdescription" id="editdescription"></textarea>
                </div>
                <div class="flex flex-col mt-4">
                    <label class="text-lg" for="editcity">City</label>
                    <input class="bg-gray-100 p-2" type="text" name="editcity" id="editcity">
                </div>
                <div class="flex flex-col mt-4">
                    <label class="text-lg" for="editcounty">County</label>
                    <input class="bg-gray-100 p-2" type="text" name="editcounty" id="editcounty">
                </div>
                <div class="flex flex-col mt-4">
                    <label class="text-lg" for="editproffesion">Proffession</label>
                    <input class="bg-gray-100 p-2" type="text" name="editproffesion" id="editproffesion" value="<?php print $user->proffession; ?>">
                </div>
                <div class="flex flex-row mt-4 w-full flex-gap-2">
                    <input id="editFormModalCancel" class="w-full bg-gray-300 hover:bg-red-300 cursor-pointer p-2 rounded-md" type="button" value="Cancel changes" name="cancel">
                    <input class="w-full bg-primary p-2 rounded-md cursor-pointer" type="submit" value="Apply changes" name="submit">
                </div>
            </div>
        </form>
    </div>

    <section class="banner w-100 m-auto border-b-4 border-red-400 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500 relative ">
        <div class="bg-shadow w-full flex justify-center items-center">
            <div class="profil mb-20">
                <div class="my-8 mx-auto w-72 h-72 inline-block rounded-full border-gray-300 border-4 overflow-hidden">
                    <img class="" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="person" width="300" height="300">
                </div>
                <?php
                if (isset($user)) { ?>
                    <h1 class="text-3xl text-center text-white capitalize"><?php print $user->fullname ?></h1>
                    <h2 class="text-2xl text-center text-white">Searching for <?php print $user->partnerSex ?> partner</h2>
                <?php } ?>
            </div>
        </div>
        <button id="openEditModal" class="absolute top-2 text-xl right-2 w-10 h-10 rounded-full bg-white hover:bg-red-200 text-primary">
            🖊
        </button>

    </section>
    <section class="w-100 m-auto">
        <div class="content-container max-w-screen-lg mx-auto flex flex-gap-4 mt-4">
            <aside class="flex flex-col inline-block min-w-max w-40 flex-shink ">
                <p class="person-property-detail bg-gray-200 px-10 pl-2 py-2 mt-1 font-bold text-lg rounded-xl border-gray-50 border-4">
                    <?php print $user->sex ?>
                </p>
                <p class="person-property-detail bg-gray-200 px-10 pl-2 py-2 mt-1 font-bold text-lg rounded-xl border-gray-50 border-4">
                    <?php print $user->birthday ?>
                </p>
                <?php if (isset($user->city) && isset($user->country)) { ?>
                    <p class="person-property-detail bg-gray-200 px-10 pl-2 py-2 mt-1 font-bold text-lg rounded-xl border-gray-50 border-4">
                        <?php print "$user->city, $user->country" ?>
                    </p>
                <?php } ?>
                <?php if (isset($user->proffession)) { ?>
                    <p class="person-property-detail bg-gray-200 px-10 pl-2 py-2 mt-1 font-bold text-lg rounded-xl border-gray-50 border-4">
                        <?php print $user->proffession; ?>
                    </p>
                <?php } ?>
                <button class="bg-tint-primary px-10 pl-2 py-2 font-bold text-left text-lg rounded-xl mt-1 hover:bg-hover-primary border-primary border-4">Get in touch</button>
                <button class="bg-tint-primary px-10 pl-2 py-2 font-bold text-left text-lg rounded-xl mt-1 hover:bg-hover-primary border-primary border-4">Show intrest</button>
            </aside>
            <div class="flex-grow ">
                <button class="float-left w-1/4 h-20 p-4 text-lg font-bold bg-red-200 hover:bg-red-300 border-red-400 border-4" data-target="summery">Summery</button>
                <button class="float-left w-1/4 h-20 p-4 text-lg font-bold bg-red-200 hover:bg-red-300" data-target="galley">Gallery</button>
                <button class="float-left w-1/4 h-20 p-4 text-lg font-bold bg-red-200 hover:bg-red-300" data-target="job">Job</button>
                <button class="float-left w-1/4 h-20 p-4 text-lg font-bold bg-red-200 hover:bg-red-300" data-target="education">Education</button>
                <div class="clear-both"></div>
                <div class="summery mt-4 " data-header="summery">
                    <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque consectetur error nesciunt eius earum sed vitae maiores libero recusandae quis excepturi rem, quae voluptas odit adipisci quibusdam. Sint, praesentium repudiandae.</p>
                    <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque consectetur error nesciunt eius earum sed vitae maiores libero recusandae quis excepturi rem, quae voluptas odit adipisci quibusdam. Sint, praesentium repudiandae.</p>
                    <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque consectetur error nesciunt eius earum sed vitae maiores libero recusandae quis excepturi rem, quae voluptas odit adipisci quibusdam. Sint, praesentium repudiandae.</p>

                </div>
                <div class="gallery grid grid-cols-4 gap-2 mt-4" data-header="galley">
                    <img class="inline-block rounded-md" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="" width="200" height="200">
                    <img class="inline-block rounded-md" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="" width="200" height="200">
                    <img class="inline-block rounded-md" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="" width="200" height="200">
                    <img class="inline-block rounded-md" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="" width="200" height="200">
                    <img class="inline-block rounded-md" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="" width="200" height="200">
                    <img class="inline-block rounded-md" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="" width="200" height="200">
                    <img class="inline-block rounded-md" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="" width="200" height="200">
                    <img class="inline-block rounded-md" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="" width="200" height="200">
                </div>
            </div>
        </div>
    </section>



    <!-- <img class="w-full" src="https://via.placeholder.com/1200x600.jpg/FCF6F8?text=placeholder%20image" alt="placeholder" width="800" height="600"> -->
    <script type="text/javascript" src="edit.js"></script>
    <script>

        function enableEditModal(e) {
            console.log('e: ', e);
            
            const backgroundBlur = document.getElementById('shadowBlur')
            const editModal = document.getElementById('editModal')
            editModal.classList.toggle('hidden')
            // backgroundBlur.classList.remove('fixed')
            backgroundBlur.classList.toggle('hidden')
        }
        
        const cancelButton = document.getElementById('editFormModalCancel')
        const openEditModal = document.getElementById('openEditModal')
        cancelButton.addEventListener('click', enableEditModal)
        openEditModal.addEventListener('click', enableEditModal)
    </script>
</body>

</html>
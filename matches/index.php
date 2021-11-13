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
        <div class="content-container max-w-screen-lg mx-auto">
            <div class="searchbox p-2 bg-gray-200">
                <label for="searcc">Search for first names</label>
                <input type="text" class="border-2 border-gray-800 p-1" name="searchInput" id="search" onkeyup="search(this.value)">
            </div>


            <div id="searchResult"></div>

        </div>
    </section>
    <script>

        function renderPerson(name, birth, location) {
            const container = document.querySelector("#searchResult")
            const personTemplate = `
            <div class="person hover:bg-gray-200 rounded-md p-4 inline-block">
                    <img class="rounded-md" src="../assets/images/rayul-_M6gy9oHgII-unsplash.jpg" alt="you" width="200" height="200">
                    <div class="person-content text-lg">
                        <p class="person-name font-bold capitalize">${name}</p>
                        <p class="person-name">${birth}</p>
                        <p class="person-name">${location}</p>
                    </div>
                </div>`
            container.insertAdjacentHTML('afterbegin', personTemplate)
            
        }

        async function search(searchString) {
            let response = await fetch("matches/update.php?action=search&value=" + searchString, {
                headers: {
                    "Content-Type": "application/json",
                }
            });
            // console.log('response: ', response);
            let data = await response.json();
            console.log('data: ', data);
            data.content.forEach(({fullname, birthday, partnerSex})=> {
                renderPerson(fullname, birthday, partnerSex)
            });
            // document.querySelector("#searchResult").innerHTML = "";

            if(data.status == "success") {
            //     for (const user of data.data) {
            //         document.querySelector("#searchResult").innerHTML += user.firstName + "<br>";
            //     }
            // } else {
            //     document.querySelector("#searchResult").innerHTML += data.errorCode;
            }
        }
    </script>
</body>

</html>
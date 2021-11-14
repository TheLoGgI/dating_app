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
            <h1 class="text-4xl font-bold my-4">Matches</h1>
            <div class="line h-0.5 bg-gray-200"></div>
            <div class="searchbox p-2 bg-gray-200">
                <label for="searcc">Search for first names</label>
                <input type="text" class="border-2 border-gray-800 p-1" name="searchInput" id="search" onkeyup="search(this.value)">
            </div>


            <div id="searchResult"></div>

        </div>
    </section>

    <section class="w-100 m-auto mt-40">
        <div class="content-container max-w-screen-lg mx-auto">
            <h1 class="text-4xl font-bold my-4">Potential Matches</h1>
            <div class="line h-0.5 bg-gray-200"></div>
            
            



        </div>
    </section>
    <script>

        function renderPerson(users) {
            console.log('users: ', users);
            const container = document.querySelector("#searchResult")
            container.replaceChildren(...users.map(user => {
                const range = document.createRange()
                range.selectNode(container)

                const personTemplate = `
                <div class="person hover:bg-gray-200 rounded-md p-4 inline-block">
                        <img class="rounded-md" src="${user.profilImage}" alt="you" width="200" height="200">
                        <div class="person-content text-lg">
                            <p class="person-name font-bold capitalize">${user.fullname}</p>
                            <p class="person-birth">${user.birthdaystring}</p>
                            <p class="person-city">${user.city}</p>
                        </div>
                    </div>`

                


                    return range.createContextualFragment(personTemplate)
                }))
                
        }

        async function search(searchString) {
            let response = await fetch("matches/update.php?action=search&value=" + searchString, {
                headers: {
                    "Content-Type": "application/json",
                }
            });

            let data = await response.json();
            console.log('data: ', data);
            renderPerson(data.content)

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
<?php
include_once "../classes/API.php";

use Datingapp\API;

// $API = new API(API::generateApiKey());
// $users = $API->users();
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
        <div class="content-container max-w-screen-lg mx-auto mt-2">
        <header class="flex justify-between items-center">
            <form id="search" class="py-4">
                    <input class="bg-gray-100 py-2 px-4 rouned-2" type="text" name="name" placeholder="matches..">
                    <input class="bg-primary py-2 px-4 rouned-2" type="submit" value="Search match">
                </form>
                <form>
                    <label for="sort" hidden>Sort</label>
                    <select class="bg-gray-100 py-2 px-4 rouned-2" name="sort" id="sorting">
                        <option selected disabled hidden value="">Sort</option>
                        <option value="name">Name</option>
                        <option value="age">Age</option>
                        <option value="gender">Gender</option>
                    </select>
                </form>
        </header>
            <div id="users" class="grid grid-cols-5 gap-4">
    
    
            </div>
        </div>
    </section>
    <script>
        let _users = []

        function showUsers(users, root) {

            root.replaceChildren(...users.map(user => {
                // Create a range object that represents a fragment of a document
                // Make the 'root' in the document become the context node (parent node)
                const range = document.createRange()
                range.selectNode(root)
                const template = `
            <a href="/profil?uuid=${user.userId}">
                <div class="hover:bg-gray-200 p-2 cursor-pointer">
                    <img class="rounded-md inline border-2 border-primary-tint w-48 h-48 object-cover" 
                    width="200" 
                    height="200" 
                    src="${user.profilImage}" alt="profil image">

                    <div class="mt-2">
                        <p class="font-bold text-lg text-black">${user.fullname}</p>
                        <p class="text-lg text-black">${user.age} years old</p>
                        <p class="text-lg text-black">${user.city}</p>
                    </div>
                </div>
            </a>`

                return range.createContextualFragment(template)
            }))
        }

        function requestUsers(searchQuery = '') {
                fetch(`../api/users?name=${searchQuery}`, {
                method: 'post',
                headers: {
                    "Content-Type": "application/json",
                }
            }).then(res => {
                console.log('res: ', res);

                if (res.ok) {
                    return res.json()
                }
                throw Error('Api failed to fetch users', res.status, res)
            }).then(data => {
                console.log('data: ', data);
                _users = data.data
                showUsers(data.data, document.getElementById('users'))
            }).catch((error) => {
                console.warn(error);
            })
        }

        document.getElementById('search').addEventListener('submit', (e) => {
            e.preventDefault()
            const searchInput = document.querySelector('#search input[name="name"]').value
            console.log('searchInput: ', searchInput);
            requestUsers(searchInput)
        })

        document.getElementById('sorting').addEventListener('change', (e) => {
            const searchType = e.target.value
            const sortedUsers = _users.sort((a, b) => a[searchType] - b[searchType])

            showUsers(sortedUsers, document.getElementById('users'))
        })


        // initial run
        requestUsers()

        
    </script>
</body>

</html>
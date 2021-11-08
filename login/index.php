<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <title>Login meeting</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="./login/style.css" rel="stylesheet" />
</head>

<body class="overflow-hidden">
    <img class="user-none absolute " src="../icons/polygon1.svg" alt="">
    <img class="user-none absolute right-2/4 -bottom-10" src="../icons/polygon2.svg" alt="">
    <img class="user-none absolute transform -right-20 scale-150 bottom-1/4" src="../icons/polygon3.svg" alt="">
    <img class="user-none absolute transform scale-125 filter blur-2xl" src="../icons/cloud.svg" alt="">
    <div class="body-wrapper w-screen h-screen flex justify-center items-center">


        <div class="login-modal max-w-screen-xl w-3/4 lg:my-4 grid grid-cols-2 relative z-10">
            <div class="bg-white p-10 w-full h-full flex flex-col justify-center items-center rounded-md">
                <form id="loginform" action="../server/login.php" method="POST" class="w-3/4 grid grid-cols-1 gap-8">
                    <h1 class="text-5xl font-bold text-primary text-white text-center">Sign in</h1>

                    <div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="email" name="email" id="emailforminput" autocomplete="email" value="katrine@gmail.com" placeholder=" " required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="emailforminput">Email</label>
                        </div>

                        <div class="input-field relative p-2 text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="password" name="password" id="passwordforminput" autocomplete="password" value="katrine" placeholder=" " required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="passwordforminput">Kodeord</label>
                        </div>
                        <div class="relative p-2 text-xl">
                            <p class="text-red-600" id="errMsg"></p>
                        </div>
                        
                    </div>
                    <input type="submit" class="bg-primary hover:bg-hover-primary cursor-pointer text-white max-w-min justify-self-center text-2xl rounded-full px-16 py-2 filter shadow-inner" value="LOGIN">
                </form>
            </div>
            <div class="bg-white p-10 w-full h-full flex flex-col justify-center items-center rounded-md">
                <form id="signupForm" action="../server/signup.php" method="POST" class="w-3/4 grid grid-cols-1 gap-8">
                    <h1 class="text-5xl font-bold text-primary text-white text-center">Sign up</h1>
                    <div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <select class="text-2xl bg-gray-100 p-2 w-full" name="sex" id="sexforminput">
                                <option value="" disabled hidden>Dit køn</option>
                                <option value="male" selected>Mand</option>
                                <option value="female">Kvinde</option>
                                <option value="non-binary">non-binær</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <select class="text-2xl bg-gray-100 p-2 w-full" name="partnergender" id="sexofpartnerforminput" autocomplete="gender">
                                <option value=""  disabled hidden>Køn partner du søger</option>
                                <option value="male">Mand</option>
                                <option value="female" selected>Kvinde</option>
                                <option value="non-binary">non-binær</option>
                                <option value="biseksual">biseksual</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="text" name="birthday" id="birthdayforminput" autocomplete="bday" placeholder=" " value="02-06-2000" required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="birthdayforminput">Fødselsdag (dd-mm-åååå)</label>
                        </div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="text" name="city" id="cityforminput" autocomplete="city" placeholder=" " value="Ikast" required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="cityforminput">By</label>
                        </div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="text" name="firstname" id="firstnameforminput" autocomplete="firstname" placeholder=" " value="Henrik" required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="firstnameforminput">Fornavn</label>
                        </div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="text" name="surname" id="surnameforminput" autocomplete="lastname" placeholder=" " value="Valle" required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="surnameforminput">Efternavn</label>
                        </div>
                    </div>

                    <div>
                        <div class="input-field relative p-2 group text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="email" name="email" id="newemailforminput" autocomplete="email" placeholder=" " value="henrikvalle@gmail.com" required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="newemailforminput">Email</label>
                        </div>

                        <div class="input-field relative p-2 text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="password" name="password" id="newpasswordforminput" autocomplete="new-password" placeholder=" " value="valle" required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="newpasswordforminput">Kodeord</label>
                        </div>
                        <div class="input-field relative p-2 text-xl cursor-pointer">
                            <input class="text-2xl bg-gray-100 p-2 outline-none w-full" type="password" name="repassword" id="repasswordforminput" autocomplete="new-password" placeholder=" " value="valle" required>
                            <label class="absolute text-gray-600 pl-4 top-1/4 left-0 text-2xl select-none" for="repasswordforminput">Gentag kodeord</label>
                        </div>
                    </div>
                    <input type="submit" class="bg-primary hover:bg-hover-primary cursor-pointer text-white max-w-min justify-self-center text-2xl rounded-full px-16 py-2 filter drop-shadow-lg" value="SIGN UP">
                </form>
            </div>

            <div id="loginModalSlider" class="info-slider rounded-md absolute w-2/4 h-full p-10 flex flex-col justify-center items-center transform translate-x-full transition duration-500 ease">
                <div class="text-center">
                    <h1 class="text-5xl font-bold text-white text-shadow text-center mb-10 leading-12">Mød med din potentielle partner</h1>
                    <p class="text-2xl text-white text-shadow w-2/3 mx-auto">Enter your personal details and start,
                        your journey with us</p>
                    <Button class="bg-primary text-white text-2xl rounded-full px-16 py-2 filter drop-shadow-lg mt-10 hover:bg-hover-primary">SIGN UP</Button>
                </div>
            </div>

        </div>

    </div>

    <script>
        async function requestLogin(datapack) {
            const msg = document.getElementById('errMsg')
            msg.textContent = ""
            const options = {
                method: 'post',
                mode: 'cors',
                requestUrl: 'http://localhost:3000/server/login.php',
                headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
                },
                
                body: JSON.stringify(Object.fromEntries(datapack))
            }
            const response = await fetch(options.requestUrl, options)
            console.log('response: ', response);
            if (response.ok) {
                const requestData = await response.json()
                sessionStorage.setItem('user', JSON.stringify(requestData.user))
                console.log('requestData: ', requestData);
                location.assign('http://localhost:3000/profil')
            } else {
                const msg = document.getElementById('errMsg')
                msg.textContent = "Password or email was wrong, try again"
            }
        }

        async function requestSignup(datapack) {
            const options = {
                method: 'post',
                mode: 'cors',
                requestUrl: 'http://localhost:3000/server/login.php',
                headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
                },
                
                body: JSON.stringify(Object.fromEntries(datapack))
            }
            const response = await fetch(options.requestUrl, options)
            
            if (response.ok) {
                const requestData = await response.text()
                console.log('requestData: ', requestData);
            }
        }

        document.getElementById('loginform').addEventListener('submit', (e) => {
            e.preventDefault()
            const formData = new FormData(e.target) 
            requestLogin(formData)
        })

        document.getElementById('signupForm').addEventListener('submit', (e) => {
            e.preventDefault()
            const formData = new FormData(e.target) 
            requestSignup(formData)
        })
        
    </script>

    <script type="text/javascript" src="./login/modalSlider.js"></script>
</body>

</html>
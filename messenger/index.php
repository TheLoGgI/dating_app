<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <title>Chatting</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet" /> -->
    <script>
        const host = 'ws://localhost:3000/websockets.php';
        const socket = new WebSocket(host);
        console.log('socket: ', socket);
        socket.onmessage = function(e) {
            document.getElementById('root').innerHTML = e.data;
        };
    </script>
</head> 

<body>
    <div class="login-modal w-3/4 lg:my-4 grid grid-cols-2 relative z-10">
        <div class="p-10 w-full h-full flex flex-col justify-center items-center rounded-md">
            <h1 class="text-5xl font-bold text-primary text-center">Messager Meeting</h1>
        </div>
    </div>
    <!-- <script type="text/javascript" src="main.js"></script> -->
</body>

</html>
<?php

    switch ($accion)
    {
        case "validate":
            include ("pages/login/validateuser.php");
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the groove. LogIn</title>
    <link rel = "icon" href = "./images/vinyl-base.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/login.css" />

</head>
<body>
    
<div class="back-form">

    <div class="row g-0">

        <div class="white-background col">
            <div class="form">
                <p class="title">LogIn</p>
                <form id="formulario" action="?seccion=login&amp;accion=validate" method="post">
                    <fieldset>
                    <p><input id="username" type="text" required name="username" id="username" class="white-input" placeholder="Username"></p>
                    <p><input id="password" type="password" required name="password" id="password" class="white-input" placeholder="Password"></p>
                    <div>
                        <a href="?seccion=login&accion=validate"><button class="black-button">Let's groove!</button></a>
                    </div>
                    <br>
                    <br>
                    </fieldset>
                </form>
                <a style="color: rgb(0, 0, 0);" href="?seccion=signup"><p>Or Sign Up</p></a>
            </div>
        </div>

        <div class="black-background col position-relative">
            <img class="huge-vinyl img-fluid float-end" src="./images/vynil-right.svg" alt="VINYL">
        </div>

    </div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
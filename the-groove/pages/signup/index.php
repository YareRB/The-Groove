<?php

    $accion = (isset($_GET['accion']) && $_GET['accion']!='') ? $_GET['accion'] : 'signup';

    switch ($accion)
    {
        case "signup":
            include ("pages/signup/signup.php");
            break;
        case "createuser":
            include ("pages/signup/createuser.php");
            break;
    }
?>
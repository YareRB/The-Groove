<?php

    $accion = (isset($_GET['accion']) && $_GET['accion']!='') ? $_GET['accion'] : 'login';

    switch ($accion)
    {
        case "login":
            include ("pages/login/login.php");
            break;
        case "validate":
            include ("pages/login/validateuser.php");
            break;
        case "logout":
            include ("pages/login/logout.php");
            break;
    }
?>
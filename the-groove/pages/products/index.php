<?php
    $accion = (isset($_GET['accion']) && $_GET['accion']!='') ? $_GET['accion'] : 'defaultPage';

    switch ($accion)
    {
        case "defaultPage":
            include ("defaultPage.php");
            break;
        case "searchPage":
            include ("searchPage.php");
            break;
    }
?>
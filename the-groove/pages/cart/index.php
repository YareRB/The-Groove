<?php
    if (isset($_SESSION["id"])) 
    {
        $accion = (isset($_GET['accion']) && $_GET['accion']!='') ? $_GET['accion'] : 'lista';

        switch ($accion)
        {
            case "lista":
                include ("lista.php");
                break;
            case "borrarVinyl":
                include ("borrarVinyl.php");
                break;
            case "payCart":
                include ("payCart.php");
                break;
        }
    }
    else
    {
        //mensaje inicie sesion
    }
?>
<?php
    if (isset($_SESSION["id"])) 
    {
        $accion = (isset($_GET['accion']) && $_GET['accion']!='') ? $_GET['accion'] : 'payment';

        switch ($accion)
        {
            case "payment":
                include ("payment.php");
                break;
        }
    }
    else
    {
        //mensaje inicie sesion
    }
?>
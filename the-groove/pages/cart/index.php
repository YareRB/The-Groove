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
            case "pay":
                
                break;
        }
    }
    else
    {
        //mensaje inicie sesion
    }
?>
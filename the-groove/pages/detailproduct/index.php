<?php
    $accion = (isset($_GET['accion']) && $_GET['accion']!='') ? $_GET['accion'] : 'detalleVinyl';

    switch ($accion)
    {
        case "detalleVinyl":
            include ("detalleVinyl.php");
            break;
        case "comprarAhora":
            include ("comprarAhora.php");
            break;
        case "agregarCarrito":
            include ("agregarCarrito.php");    
            break;
    }
?>
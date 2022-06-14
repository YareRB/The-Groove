<?php  
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    
    include("connection/index.php"); 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the groove.</title>
    <link rel = "icon" href = "./icons/account.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/index.css" />
    
</head>
<body class="dark-background text-whity scroll">
    
<?php
        $seccion = (isset($_GET['seccion']) && $_GET['seccion'] != '') ? $_GET['seccion'] : 'inicio';
        $accion = (isset($_GET['accion']) && $_GET['accion'] != '') ? $_GET['accion'] : 'lista';
        include("navbar/index.php");
        ?>

        <div class="container">
        <?php
        switch ($seccion) {
            case "inicio":
                include("inicio/index.php");
                include("productos/lista.php");
                break;
            case "aviso":
                include("aviso/index.php");
                break;
            case "terminos":
                include("terminos/index.php");
                break;
            case "acceso":
                include("acceso/index.php");
                break;
        }
 
        include("footer/index.php");

    ?>
</div>
    
</body>
</html>
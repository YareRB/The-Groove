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
    <link rel = "icon" href = "./icons/vynil-icon.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/myaccount.css" />
    
</head>
<body class="dark-background text-whity black-scroll">
    
<?php
        $seccion = (isset($_GET['seccion']) && $_GET['seccion'] != '') ? $_GET['seccion'] : 'home';
        $accion = (isset($_GET['accion']) && $_GET['accion'] != '') ? $_GET['accion'] : 'lista';
        include("pages/navbar/index.php");
        ?>

        <br>
        <br>

        <?php
        switch ($seccion) {
            case "home":
                include("pages/landingpage/index.php");
                break;
            case "products":
                include("pages/products/index.php");
                break;
            case "cart":
                include("pages/cart/index.php");
                break;
            case "myaccount":
                include("pages/myaccount/index.php");
                break;
        }

    ?>

        <br>
        <br>
        <br>
<?php
    include("pages/footer/index.php");
?>
    
</body>
</html>
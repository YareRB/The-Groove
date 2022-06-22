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
    <title>The groove</title>
    <link rel = "icon" href = "./icons/vynil-icon.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/myaccount.css" />

    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    
</head>
<body class="dark-background text-whity black-scroll">

        <?php
            $seccion = (isset($_GET['seccion']) && $_GET['seccion'] != '') ? $_GET['seccion'] : 'splash';
        ?>

        <?php
        switch ($seccion) {
            case "splash": 
                include("pages/splashscreen/index.php");
                break;
            case "home":
                include("pages/navbar/index.php");
                include("pages/landingpage/index.php");
                include("pages/footer/index.php");
                break;
            case "products":
                include("pages/navbar/index.php");
                include("pages/products/index.php");
                include("pages/footer/index.php");
                break;
            case "cart":
                include("pages/navbar/index.php");
                include("pages/cart/index.php");
                include("pages/footer/index.php");
                break;
            case "myaccount":
                if(isset($_SESSION["id"])) {
                    include("pages/navbar/index.php");
                    include("pages/myaccount/index.php");
                    include("pages/footer/index.php");
                }
                else {
                    include("pages/login/index.php");
                }
                break;
            case "signup":
                include("pages/signup/index.php");
                break;
            case "login":
                include("pages/login/index.php");
                break;
            case "myorders":
                include("pages/navbar/index.php");
                include("pages/myorders/index.php");
                include("pages/footer/index.php");
                break;
            case "orderdetail":
                include("pages/navbar/index.php");
                include("pages/orderdetail/index.php");
                include("pages/footer/index.php");
                break;
            case "payment":
                include("pages/navbar/index.php");
                include("pages/payment/index.php");
                include("pages/footer/index.php");
                break;
            case "detailproduct":
                include("pages/navbar/index.php");
                include("pages/detailproduct/index.php");
                include("pages/footer/index.php");
                break;
        }

    ?>

<script src="sweetalert2.all.min.js"></script>
    
</body>
</html>
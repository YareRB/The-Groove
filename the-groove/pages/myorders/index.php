<?php 
    $accion = (isset($_GET['accion']) && $_GET['accion']!='') ? $_GET['accion'] : 'lista';
    $id = $_SESSION["id"];

    switch ($accion)
    {
        case "lista":
            $parameter ="";
            
            break;
        case "search":
            $parameter = $_GET["val"];
            break;
    }

    $search = "%".$parameter."%";
    $consulta  = "  SELECT dor.idOrder, s.description, v.vinylName, v.image, v.idVinyl  FROM jramirez.detailOrder dor 
                    LEFT JOIN jramirez.`order` o ON dor.idOrder = o.idOrder
                    LEFT JOIN jramirez.`status` s ON o.idStatus = s.idStatus
                    LEFT JOIN jramirez.vinyl v ON dor.idVinyl = v.idVinyl
                    WHERE idUser=? AND v.vinylName LIKE ?;";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $id);
    $query->bindParam(2,  $search);
    $query->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
    <link rel = "icon" href = "./icons/my-orders.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/orders.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

</head>
<body class="black-scroll">
    <div class="container-fluid padding-l-20 margin-t-10 ">
        <div class="row">
            <div class="col-11 col-sm-11 col-md-8 col-lg-7 col-xl-7 col-xxl-7 ms-5 parent ">
                <p><input value="<?=$parameter?>" id="search" onchange="search(this.value)" type="text" class="white-input relative-div" placeholder="Search...">
                <img class="img-icon abs-icon" src="./icons/search.svg" alt="">
                </p>
            </div>
            <div class="col-11 col-sm-11 col-md-3 col-lg-3 col-xl-3 col-xxl-3 ms-5 parent ">
                <p><input type="text" class="white-input relative-div" placeholder="Filter">
                <img class="img-icon abs-icon" src="./icons/filter.svg" alt="">
                </p>
            </div>
        </div>
        <?php 
        while($registro = $query->fetch()) {
        ?>
            <div class="row pb-4  pt-3">
                <div class="col-12 col-sm-12 col-md-7 col-lg-5 col-xl-5 col-xxl-5 parent">
                    <img class="img-disc-cart" src="./images/vinyl.svg" alt="">
                    <img class="img-cart"  src="./images/<?=$registro["image"]?>" alt="">
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5  pt-3">
                    <h3 class="title-lato"><?=$registro["vinylName"]?></h3>
                    <h5 class="pt-1 color-gray title-inter"> <?=$registro["description"]?> </h5>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2">
                    <a href="?seccion=orderdetail&dato1=<?=$registro["idVinyl"]?>&dato2=<?=$registro["idOrder"]?>" id="link">
                        <div class="btn-group w-100" role="group" aria-label="Basic example">
                            <button type="button" class="btn bg-dark radius-l radius-r text-white title-inter-12 " >View more...</button>
                        </div>
                    </a>
                </div>
            </div>
            <hr>
        <?php 
        } 
        ?>
    </div>
    <script>
        function search(val) {
            window.location.href = "?seccion=myorders&accion=search&val="+val;
        }

        

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>            
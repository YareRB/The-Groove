<?php 
    $id = $_SESSION["id"];
    $idVinyl = $_GET["dato1"];
    $idOrder = $_GET["dato2"];

    $consulta  = "  SELECT dor.idOrder, v.idVinyl, o.total, s.description, v.vinylName, v.price, v.image  FROM jramirez.detailOrder dor 
                    LEFT JOIN jramirez.`order` o ON dor.idOrder = o.idOrder
                    LEFT JOIN jramirez.`status` s ON o.idStatus = s.idStatus
                    LEFT JOIN jramirez.vinyl v ON dor.idVinyl = v.idVinyl
                    WHERE idUser=? AND v.idVinyl=? AND dor.idOrder =?;";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $id);
    $query->bindParam(2, $idVinyl);
    $query->bindParam(3, $idOrder);
    $query->execute();
    $order = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Order</title>
    <link rel = "icon" href = "./icons/detail-order.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/orders.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/orderdetail.css">
    <link rel="stylesheet" href="./css/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

</head>
<body class="black-scroll">
    <div class="container-fluid margin-t-10 ps-5 pe-5">
        <div class="row  ms-5">
            <div class="col-12 col-sm-12 col-md-7 col-lg-6 col-xl-6 col-xxl-6 parent">
                <img class="img-disc-cart" src="./images/vinyl.svg" alt="">
                <img class="img-cart" src="./images/<?=$order["image"]?>" alt="">
            </div>
            <div class="col-11 col-sm-11 col-md-4 col-lg-5 col-xl-5 col-xxl-5 m-t-100 m-s-20 ">
                <h3 class="title-lato"><?=$order["vinylName"]?></h3>
                <label class="text"> <strong>No. Order:</strong> <label class="ms-3"><?=$idOrder?></label></label>
                <br>
                <label class="text"> <strong>Total  :</strong> <label class="ms-5">$<?=$order["total"] + 200?></label></label>

                <h5 class="pt-1 color-gray text mt-2"> <?=$order["description"]?> </h5>
                <h4 class="pt-1 title-inter-25 pt-2"> Price: $<?=$order["price"]?></h4>
            </div>
        </div>

        <label class="text ms-5 ps-4 mt-5"> <strong>Bought with:</strong></label>

        <?php
            $consulta2  = "  SELECT  v.vinylName, v.image,  dor.idOrder, v.idVinyl FROM jramirez.detailOrder dor 
                            LEFT JOIN jramirez.`order` o ON dor.idOrder = o.idOrder
                            LEFT JOIN jramirez.vinyl v ON dor.idVinyl = v.idVinyl
                            WHERE idUser=? AND dor.idOrder =? AND v.idVinyl != ?;";
            $query2 = $conn->prepare($consulta2);
            $query2->bindParam(1, $id);
            $query2->bindParam(2, $idOrder);
            $query2->bindParam(3, $idVinyl);
            $query2->execute();
        ?>
        <div class="row mt-3">
            <?php 
                while($registro = $query2->fetch()) {
            ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 parent">
                <a href="?seccion=orderdetail&dato1=<?=$registro["idVinyl"]?>&dato2=<?=$registro["idOrder"]?>">
                    <img class="img-disc-cart vinyl" src="./images/vinyl.svg" alt="">
                    <img class="img-cart disc" src="./images/<?=$registro["image"]?>" alt="">
                </a>
                <h5 class="color-gray text mt-3 ms-5 ps-4"><?=$registro["vinylName"]?></h5>
            </div>
            <?php 
                } 
            ?>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>
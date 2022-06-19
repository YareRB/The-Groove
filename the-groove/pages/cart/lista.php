<?php 
    $id = $_SESSION["id"];
    $consulta  = "  SELECT v.idVinyl, v.vinylName, v.image, v.price, dc.idStatus, dc.idDetailCart  FROM jramirez.detailCart dc 
                    LEFT JOIN jramirez.cart c ON dc.idCart = c.idCart
	                LEFT JOIN jramirez.vinyl v ON dc.idVinyl = v.idVinyl
                    WHERE idUser=? AND dc.idStatus = 4;";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $id);
    $query->execute();
    $total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel = "icon" href = "./icons/cart.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

</head>
<body class="black-scroll">
    <div class="container-fluid padding-l-20 mt-5 margin-t-10">
        <?php 
        while($registro = $query->fetch()) {
            $total += $registro["price"];
            ?>
        <div class="row pb-4">
            <div class="col-12 col-sm-12 col-md-7 col-lg-5 col-xl-5 col-xxl-5 parent">
                <img class="img-disc-cart" src="./images/vinyl.svg" alt="">
                <img class="img-cart" src="./images/<?=$registro["image"]?>" alt="">
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5  pt-3">
                <h3 class="title-lato"><?=$registro["vinylName"]?></h3>
                <h4 class="pt-1 title-inter" >Price: $<label id="precio<?=$registro["idVinyl"]?>"><?= $registro["price"]?></label></h4>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 pe-3">
                <a href="?seccion=cart&accion=borrarVinyl&idVinyl=<?=$registro['idVinyl']?>&idDetailCart=<?=$registro["idDetailCart"]?>?>">
                    <img class="cart-delete-icon" src="./icons/delete.svg" alt="">
                </a>
                <div class="btn-group w-100" role="group" aria-label="Basic example">
                    <button onclick="menos(<?= $registro['idVinyl'] ?>)" type="button" class="btn bg-dark radius-l btn-less-more" ><img class="img-icono" src="./icons/less.svg" alt="-"></button>
                    <label id=<?= $registro['idVinyl'] ?> class="btn bg-dark text-white title-inter-12 btn-less-more" >1</label>
                    <button onclick="mas(<?= $registro['idVinyl'] ?>)" type="button" class="btn bg-dark radius-r btn-less-more"><img class="img-icono" src="./icons/more.svg" alt="-"></button>
                </div>
            </div>
        </div>
    <hr>
    <?php 
    } 
    ?>

    </div>
    <div class="float-end p-fixed">
        <form id="formulario" action="?seccion=cart&amp;accion=payCart" method="post">
            <fieldset>
                <input  name="totalInput" id="totalInput" type="number" hidden value="<?=$total?>" id="totalInput">
                <p class="title-lato">Total: $<label class="text-inter-25" id="totalLabel"><?=$total ?> </label></p>
                <button type="submit" class="btn bg-dark radius-l radius-r text-white btn-pay title-inter-12" >Pay</button>
            </fieldset>
        </form>
    </div>

    <script>
        var total = parseFloat(document.getElementById("totalInput").value);
        document.getElementById("totalInput").value = total;

        function menos(index){
            var pieza = parseInt(document.getElementById(index).innerHTML);
            if(pieza > 1){
                pieza --;
                total -= parseFloat(document.getElementById("precio"+index).innerHTML);
                document.getElementById("totalLabel").innerHTML = total;
                document.getElementById("totalInput").value = total;
                document.getElementById(index).innerHTML = pieza;
                
            }
        }

        function mas(index){
            var pieza = parseInt(document.getElementById(index).innerHTML);
            if(pieza < 10){
                pieza ++;
                total += parseFloat(document.getElementById("precio"+index).innerHTML);
                document.getElementById("totalLabel").innerHTML = total;
                document.getElementById("totalInput").value = total;
                document.getElementById(index).innerHTML = pieza;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>
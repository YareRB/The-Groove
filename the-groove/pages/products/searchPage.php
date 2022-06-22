<?php
    $consulta  = "SELECT * FROM jramirez.vinyl v LEFT JOIN jramirez.artist a ON v.idVinyl = a.idArtist WHERE " . $_POST["filter"] . " LIKE '%" . $_POST["search"] . "%' ORDER BY " . $_POST["filter"] ." " . $_POST["order"] . ";";

    $query = $conn->prepare($consulta);
    $query->execute();
    $contador = 0;
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel = "icon" href = "../../icons/products.svg" type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/landing.css">
</head>
<body class="black-scroll">
    <section>
        <div class="container-fluid mx-4">
        <form action="?seccion=products&accion=searchPage" method="post">
                <div class="row">
                    <div class="col-11 col-sm-11 col-md-4 col-lg-4 col-xl-4 col-xxl-4 ms-5 mb-3 parent ">
                            <p><input value=<?=$_POST["search"]?> type="text" class="white-input relative-div" name="search" placeholder="Search...">
                                <input type="image" class="img-icon abs-icon" src="./icons/search.svg" alt="Submit"/>
                            </p>
                    </div>
                    <div class="col-11 col-sm-11 col-md-3 col-lg-3 col-xl-3 col-xxl-3 ms-5 mb-3 parent ">
                        <p>
                        <select style="-webkit-appearance: none;" class="white-input relative-div" name="filter" id="filter">
                            <option value="vinylName">Album</option>
                            <option value="artistName">Artist</option>
                        </select>
                        <img class="img-icon abs-icon" src="./icons/filter.svg" alt="">
                        </p>
                    </div>
                    <div class="col-11 col-sm-11 col-md-2 col-lg-2 col-xl-2 col-xxl-2 ms-5 mb-3 parent ">
                        <p>
                            <select style="-webkit-appearance: none;" class="white-input relative-div" name="order" id="order">
                                <option value="ASC">Asc.</option>
                                <option value="DESC">Desc.</option>
                            </select>
                        <img class="img-icon abs-icon" src="./icons/order.svg" alt="">
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section>
        <div class="container-fluid mx-4">
            <div style="display: flex; flex-direction: row; flex-wrap: wrap; overflow: hidden;">
                <?php 
                     while($registro = $query->fetch()) {
                ?>
                <div style="width: 25%;" class="parent mb-4">
                <a id="link" href="?seccion=detailproduct&idVinyl=<?=$registro["idVinyl"]?>">
                    <img class="img-vinyl" src="./images/vinyl.svg" alt="">
                    <img class="img-album" src="./images/<?=$registro["image"]?>" alt=""></a>
                    <div class="row px-4 pt-2">
                        <div class="col-7">
                            <h3 class="lbl-titulo"><?=$registro["artistName"]?> - <?=$registro["vinylName"]?></h3>
                        </div>
                        <div class="col-5">
                            <p class="lbl-precio">$<?=$registro["price"]?></p>
                        </div>
                    </div>
                </div>
                <?php
                $contador++; 
                } 
                
                if(!$contador)
                    echo "<p class='text-center'>No results found</p>";
                ?>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
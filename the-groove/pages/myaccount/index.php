<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the groove.</title>
    <link rel = "icon" href = "../../images/vinyl-base.svg" type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../css/index.css" />
</head>
<body class="black-scroll white-background">
    
    <div class="container">
    <div class="row g-0">

        <div class="col m-4" style="position: relative;">
            <img style="position: absolute; left: 27%; height: auto; width: 100%; max-width: 350px;" src="./images/vinyl.svg" alt="">
            <img src="./images/thank-u-next-ariana-grande.svg" style="position: absolute; height: auto; width: 100%; max-width: 350px;" alt="">
        </div>
        <div class="col">
            <p class="subtitle mt-4">Hello, <?=$_SESSION["username"]?>!</p>
            <p class="general-text"><?=$_SESSION["email"]?></p>
            <p class="general-text"><?=$_SESSION["phoneNumber"]?></p>
            <a href="?seccion=myorders">
                <button class="black-button">Go to My Orders</button>
            </a>
        </div>

    </div>

    <div class="orders">
        <p class="subtitle2">My Orders</p>
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-12">
                <img width="250px" height="250px" class="img-fluid" src="./images/after-hours-the-weeknd.svg" alt="">
                <p class="general-text">Title - artist</p>
            </div>

            <?php 
                $id = $_SESSION["id"];

                $consulta  = "SELECT idOrder FROM jramirez.order
                              WHERE idUser = ?;";

                $query = $conn -> prepare($consulta);
                $query -> bindParam(1, $id);
                $query -> execute();

                while($orderitem = $query -> fetch()) {

                    $idOrder = $orderitem["idOrder"];

                    $consultaDetail  = "SELECT idVinyl FROM jramirez.detailOrder
                                WHERE idOrder = ?;";

                    $queryDetail = $conn -> prepare($consultaDetail);
                    $queryDetail -> bindParam(1, $idOrder);
                    $queryDetail -> execute();

                    $total = 0;
                    $total = $queryDetail -> rowCount();

                    if ($total > 0) {

                        while($orderdetailitem = $queryDetail -> fetch()) {

                            $idVinyl = $orderdetailitem["idVinyl"];
        
                            $consultaVinyl  = "SELECT * FROM vinyl
                                        WHERE idVinyl = ?;";
        
                            $queryVinyl = $conn -> prepare($consultaVinyl);
                            $queryVinyl -> bindParam(1, $idVinyl);
                            $queryVinyl -> execute();
                            
                            while($vinyl = $queryVinyl -> fetch()) {

                                //Titulo e imagen
                                print($vinyl["image"]);
                                print($vinyl["vinylName"]);

                                $idArtist = $vinyl["idArtist"];

                                $consultaArtist  = "SELECT * FROM artist
                                        WHERE idArtist = ?;";
        
                                $queryArtist = $conn -> prepare($consultaArtist);
                                $queryArtist -> bindParam(1, $idArtist);
                                $queryArtist -> execute();

                                while($artist = $queryArtist -> fetch()) {

                                    //Artista
                                    print($artist["artistName"]);

                                }

                            }
                        }

                    }
                }
            ?>

        </div>
    </div>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
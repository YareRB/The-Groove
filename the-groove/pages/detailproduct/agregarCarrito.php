<?php 
if (isset($_SESSION["id"])) 
    {
        $idVinyl = $_GET["idVinyl"];
        //verificar si el usuario tiene un carrito
        $id = $_SESSION["id"];
        $consulta  = "SELECT idCart FROM jramirez.cart WHERE idUser = ?;";
        $query = $conn->prepare($consulta);
        $query->bindParam(1, $id);
        $query->execute();

        $registro = $query -> rowCount();
        if($registro){//tiene
            $datos = $query->fetch();
            $idCart = $datos['idCart'];
                //Verificar si está agregado en detailCart
                $consulta  = "SELECT * FROM jramirez.detailCart WHERE idCart = ? AND idVinyl = ?;";
                $query = $conn->prepare($consulta);
                $query->bindParam(1, $idCart);
                $query->bindParam(2, $idVinyl);
                $query->execute();
                $registro = $query -> rowCount();
                if($registro){//sí -> estatus a 4
                    $consulta  = " UPDATE jramirez.detailCart SET
                    idStatus = 4
                    WHERE jramirez.detailCart.idCart  = ? AND jramirez.detailCart.idVinyl = ?";
                    $query = $conn->prepare($consulta);
                    $query->bindParam(1, $idCart);
                    $query->bindParam(2, $idVinyl);
                    $query->execute();
                }else{//else -> agregar nuevo registro
                    //se agrega el disco al detalle
                    $consulta  = "INSERT INTO  jramirez.detailCart (idVinyl, idCart, idStatus) VALUES (?, ?, '4');";
                    $query = $conn->prepare($consulta);
                    $query->bindParam(1, $idVinyl);
                    $query->bindParam(2, $idCart);
                    $query->execute();
                }
        }else{//no tiene
            //se crea un nuevo carrito
            $consulta  = "INSERT INTO  jramirez.cart (idUser) VALUES (?); SELECT LAST_INSERT_ID();";
            $query = $conn->prepare($consulta);
            $query->bindParam(1, $id);
            $query->execute();

            $idCart = $conn->lastInsertId();

            //se agrega el disco al detalle
            $consulta  = "INSERT INTO  jramirez.detailCart (idVinyl, idCart, idStatus) VALUES (?, ?, '4');";
            $query = $conn->prepare($consulta);
            $query->bindParam(1, $idVinyl);
            $query->bindParam(2, $idCart);
            $query->execute();
        }
        ?>
        <script>
        window.location.href = "?seccion=cart"
        </script>
        <?php
    } 
    else 
    {
?>
<script>
    window.location.href = "?seccion=login"
</script>
<?php
    }
?>
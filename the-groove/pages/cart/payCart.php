<?php
    $total = $_POST['totalInput'];
    $idUser = $_SESSION["id"];
    
    $consulta  = "INSERT INTO  jramirez.`order` (`idUser`, `total`, `idStatus`, `numberOfVinyls`) VALUES (?,?,'6','0');";

    $query = $conn -> prepare($consulta);
    $query -> bindParam(1, $idUser);
    $query -> bindParam(2, $total);
    $query -> execute();
    $query ->closeCursor();

    $idOrder = $conn->lastInsertId();

    $consulta3 = "SELECT v.idVinyl, dc.idStatus FROM jramirez.detailCart dc 
                    LEFT JOIN jramirez.cart c ON dc.idCart = c.idCart
                    LEFT JOIN jramirez.vinyl v ON dc.idVinyl = v.idVinyl
                    WHERE idUser=? AND dc.idStatus = 4;";
    $query3 = $conn -> prepare($consulta3);
    $query3->bindParam(1, $idUser);
    $query3->execute();
    //$query3 ->closeCursor();
    //PDO::FETCH_ASSOC
    
    while($registro = $query3->fetch()) {
        $consulta4 = "INSERT INTO jramirez.`detailOrder` (`idOrder`, `idVinyl`) VALUES (?, ?);";
        $query4 = $conn -> prepare($consulta4);
        $query4 -> bindParam(1, $idOrder);
        $query4 -> bindParam(2, $registro["idVinyl"]);
        $query4 -> execute();
        //$query4 -> closeCursor();

        $consulta5 = "UPDATE jramirez.detailCart SET idStatus = 5 WHERE jramirez.detailCart.idVinyl  = ?";
        $query5 = $conn -> prepare($consulta5);
        $query5 -> bindParam(1, $registro["idVinyl"]);
        $query5 -> execute();
    }
    
?>
<script>
    window.location.href = "?seccion=payment&dato1=<?=$total?>&dato2=<?=$idOrder?>";
</script> 
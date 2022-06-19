<?php 
if (isset($_SESSION["id"])) 
    {
            $idUser = $_SESSION["id"];
            $idVinyl = $_GET["idVinyl"];
            $total = $_GET['total'];

            $consulta  = "INSERT INTO  jramirez.order (idUser, total, idStatus, numberOfVinyls) VALUES (?,?,'6','0');";

            $query = $conn -> prepare($consulta);
            $query -> bindParam(1, $idUser);
            $query -> bindParam(2, $total);
            $query -> execute();
            $query ->closeCursor();

            $idOrder = $conn->lastInsertId();

            $consulta4 = "INSERT INTO jramirez.detailOrder (idOrder, idVinyl) VALUES (?, ?);";
            $query4 = $conn -> prepare($consulta4);
            $query4 -> bindParam(1, $idOrder);
            $query4 -> bindParam(2, $idVinyl);
            $query4 -> execute();
        ?>
        <script>
         window.location.href = "?seccion=payment&dato1=<?=$total?>&dato2=<?=$idOrder?>"; 
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
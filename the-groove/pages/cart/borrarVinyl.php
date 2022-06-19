<?php
    $idVinyl = $_GET["idVinyl"];
    $idDetailCart = $_GET["idDetailCart"]; 

    $consulta  = " UPDATE jramirez.detailCart SET
                    idStatus = 5
                    WHERE jramirez.detailCart.idDetailCart  = ? ";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $idDetailCart);
    $query->execute();

?>
<script>
    window.location.href = "?seccion=cart";
</script>
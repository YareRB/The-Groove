<?php 
print("si entra ");
    $idOrder = $_GET["idOrder"];
    $consulta  = "  UPDATE jramirez.`order` SET idStatus = 1 WHERE (idOrder = ?);";
    $query = $conn->prepare($consulta);
    $query->bindParam(1, $idOrder);
    $query->execute();
?>
<script>
    window.location.href = "?seccion=products";
</script>
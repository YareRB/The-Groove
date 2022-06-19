<?php

	$username = $_POST['username'];
	$password = $_POST['password'];

	$consulta  = "SELECT * FROM
				user WHERE username = ? 
				AND password = ?";

	$query = $conn -> prepare($consulta);
	$query -> bindParam(1, $username);
	$query -> bindParam(2, $password);
	$query -> execute();
	$cuenta = 0;
	$cuenta = $query -> rowCount();

    print($cuenta);

	if ($cuenta)
	{
      $redireccionar = "?seccion=home";
	  // guarda la sesión
	  $registro = $query -> fetch();
      $_SESSION["id"] =  $registro["idUser"];
      $_SESSION["username"] =  $registro["username"];
      $_SESSION["email"] =  $registro["email"];
      $_SESSION["phoneNumber"] =  $registro["phoneNumber"];
    }
  else
  	print(':(');
    //$redireccionar="?seccion=acceso&accion=ingresa&mensaje=novalido";
?>
<script>
  window.location.href = "<?=$redireccionar?>";
</script>
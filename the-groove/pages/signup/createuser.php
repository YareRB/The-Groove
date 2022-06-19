<?php

    // crea el usuario
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $repeatpassword = $_POST["repeatpassword"];

    if($password == $repeatpassword) {

        $consulta  = "INSERT INTO user (username, email, phoneNumber, password) 
                    VALUES (?,?,?,?)";
                    
        $query = $conn -> prepare($consulta);
    
        $query -> bindParam(1, $username);
        $query -> bindParam(2, $email);
        $query -> bindParam(3, $phoneNumber);
        $query -> bindParam(4, $password);
        $query -> execute();

    // inicia sesión
    $consulta  = "SELECT * FROM
				user WHERE username = ? 
				AND password = ?";

	$query = $conn -> prepare($consulta);

	$query -> bindParam(1, $username);
	$query -> bindParam(2, $password);
	$query -> execute();
	$cuenta = 0;
	$cuenta = $query -> rowCount();

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
    else {
        // validar si la contraseña no coincide
        print('contra no coincide');
     }
    
  }
  else {
    // validar si la contraseña no coincide
    print('contra no coincide');
  }

?>
<script>
  window.location.href = "<?=$redireccionar?>";
</script>

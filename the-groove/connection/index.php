<?php

	$usuario    = "jramirezadm";
	$contrasena = "]wA{97kP#)R+%3J08R";
	try{
    	$conn = new PDO('mysql:host=localhost;dbname=jramirez', $usuario, $contrasena);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	}
		catch(PDOException $e)
			{
    			echo "ERROR: " . $e->getMessage();
			}
?>
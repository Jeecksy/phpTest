<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<title>test</title>
	<style>
		input{
			width: 50% !important;
			margin: 0 auto;
		}
		input[type="submit"]{
			width: auto !important;
		}
	</style>
</head>

<body style="text-align: center !important">
	<div class = "container"> 

		<?php
		//conexion a base de datos
		$servername = "localhost";
		$username = "login";
		$password = "EnderDavid3";
		$dbname = "phptest";
		//request de los datos de registro
		$nombre = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
		$pass = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";

		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
			echo "La conexión fallo por alguna razon...";
		} 

		$sqlselect = "SELECT nombre FROM user WHERE nombre = '$nombre'";
		$sqlinsert = "INSERT INTO user (id,nombre,password) VALUES (null,'$nombre','$pass')";

		$resultado = $conn->query($sqlselect);

		if($resultado->num_rows > 0){
			echo "<h1>Ya existe un usuario con ese nombre, vuelve al <a href='registro.php'>registro.</a></h1>";
			die();
		}
		else{
			if ($conn->query($sqlinsert) === TRUE) {
				echo "<h1>Usuario Registrado Exitosamente!</h1>";
				echo "<a href='login.php'>Ingresa sesión para continuar:</a>";
			} else {
				echo "<h1>Error creando el Usuario : " . $sql . "<br>" . $conn->error . "</h1>";
			}
		}


		?>



	</div>
</body>

</html>

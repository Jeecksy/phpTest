<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<title>test</title>
</head>


<style>
	input{
		width: 50% !important;
		margin: 0 auto;
	}
	input[type="submit"]{
		width: auto !important;
	}
</style>


<body style="text-align: center !important">
	<div class = "container"> 
		<?php
		$nombre = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
		$pass = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";

		if($nombre != "" AND $pass != ""){
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
				die();
			} 

			$sqlselect = "SELECT * FROM user WHERE nombre = '$nombre' AND password='$pass'";

			$resultado = $conn->query($sqlselect);
			if($resultado->num_rows > 0){
				while($row = $resultado->fetch_assoc()) {
					echo "Bienvenido, usuario " . $row["nombre"];
				}
			}else{
				echo "Error de inicio de sesión, no se encontró un usuario con esas credenciales.";
				echo "<br>";

			}
			echo "<a href='login.php'> Volver a logear </a>";

		}


		?>
	</body>

	</html>





<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<title>test</title>
</head>

<script>
	function validarLog() {
		var x = document.forms["log"]["name"].value;
		var y = document.forms["log"]["password"].value;
		var z = document.forms["log"]["repassword"].value;
		if (x == "") {
			alert("Debe ingresar un nombre para el registro.");
			return false;
		}
		if (y == "") {
			alert("Debes ingresar tu contraseña secreta.")
			return false;
		}
		if (y != z) {
			alert("Tu confirmación de contraseña no es la misma.")
			return false;
		}

	}
</script>

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
		<h1>Registro</h1>
		<form name="log" method="post"  action="registro2.php" class="form-group" onsubmit="return validarLog()">
			<br>
			<h5>Usuario</h5>
			<input name="name" type="text" class="form-control">
			<br>
			<h5>Contraseña</h5>
			<input name="password" type="password" class="form-control">
			<br>
			<h5>Confirmar Contraseña</h5>
			<input name="repassword" type="password" class="form-control">
			<br>
			<input type="submit" value="Registrarse">
			<br>	
			<br>
			<a href ="login.php">Volver al Inicio de Sesión</a>
			<br>
		</form>

		<div>
		</body>

		</html>

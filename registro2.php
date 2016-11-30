<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

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
        include 'conexion.php';
            //conexion a base de datos
        $conn = new Conexion();
        $connect = $conn->getConn();

            //request de los datos de registro
        $nombre = isset($_REQUEST['name']) ? $conn->stringEscape($_REQUEST['name']) : "";
        $pass = isset($_REQUEST['password']) ? $conn->stringEscape($_REQUEST['password']) : "";
        $pass = $conn->encrypt($pass);
        
        if ($connect->connect_error) {
            echo "La conexión fallo por alguna razon...";
        }

        $sqlselect = "SELECT nombre FROM user WHERE nombre = '$nombre'";
        $sqlinsert = "INSERT INTO user (id,nombre,password) VALUES (null,'$nombre','$pass')";

        $resultado = $connect->query($sqlselect);

        if ($resultado->num_rows > 0) {
            echo "<h1>Ya existe un usuario con ese nombre, vuelve al <a href='registro.php'>registro.</a></h1>";
            die();
        } else {
            if ($connect->query($sqlinsert) === TRUE) {
                echo "<h1>Usuario Registrado Exitosamente!</h1>";
                echo "<a href='login.php'>Ingresa sesión para continuar:</a>";
            } else {
                echo "<h1>Error creando el Usuario : " . $sql . "<br>" . $connect->error . "</h1>";
            }
        }
        ?>



    </div>
</body>

</html>

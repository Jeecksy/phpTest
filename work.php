<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">

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
            include 'conexion.php';
            include 'sesiones.php';

            if (!validarUser()) {
                $nombre = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
                $pass = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";

                if ($nombre != "" AND $pass != "") {
                    $conn = new Conexion();
                    //conexion a base de datos
                    $connect = $conn->getConn();
                    //request de los datos de registro
                    $nombre = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
                    $pass = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";

                    if ($connect->connect_error) {
                        echo "La conexión fallo por alguna razon...";
                        die();
                    }

                    $sqlselect = "SELECT nombre,password FROM user WHERE nombre = '$nombre'";
                    $resultado = $connect->query($sqlselect);


                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            echo "Bienvenido, usuario " . $row["nombre"];
                            echo ("<br>");
                            echo "Verificando contraseña...";
                            echo ("<br>");
                            if ($conn->verify($pass, $row["password"])) {
                                echo "Verificacion completada. Usted es el verdadero usuario!.";
                                iniciarSesion($row["nombre"]);
                                echo "<br>Sesión iniciada correctamente. <a href='perfil.php'> Ir a Perfil </a>";
                            } else {
                                echo"ERROR DE CONTRASEÑA!";
                            }
                        }
                    } else {
                        echo "Error de inicio de sesión, no se encontró un usuario con ese nombre.";
                    }
                }

                echo "<br>";
                echo "<a href='login.php'> Volver a logear </a>";
            } else {
                echo "Su sesión se encuentra iniciada.";
                echo "<br><a href='perfil.php'>Ir al perfil</a>";
            }
            ?>
    </body>

</html>





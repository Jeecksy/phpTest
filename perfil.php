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
            include 'sesiones.php';
            if (validarUser()) {
                echo "<h1>Hola! Estas en tu sesion, usuario " . $_SESSION['nombre'] . "</h1>";
                echo "<a href = 'logout.php'> Cerrar sesión </a>";
            } else {
                echo 'No has iniciado sesion, <a href="login.php">Volver a logear</a>';
            }
            ?>
        </div>
    </body>
</html>
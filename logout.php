<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <title>test</title>
    </head>

    <body style="text-align: center !important">
        <div class = "container"> 
            <?php
            include 'sesiones.php';
            cerrarSesion();
            echo '<script type="text/javascript">location.href = "login.php";</script>';
            ?>
        </div>
    </body>

</html>


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
            if (x === "") {
                alert("Debe ingresar un nombre.");
                return false;
            }
            if (y === "") {
                alert("Debes ingresar tu contraseña.");
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

    <?php
    include 'sesiones.php';
    if (!validarUser()) {
        echo '
    <body style="text-align: center !important">
        <div class = "container"> 
            <h1>Login</h1>
            <form name="log" method="post"  action="work.php" class="form-group" onsubmit="return validarLog()">
                <br>
                <br>
                <h5>Usuario</h5>
                <input name="name" type="text" class="form-control">
                <br>
                <h5>Contraseña</h5>
                <input name="password" type="password" class="form-control">
                <br>
                <input type="submit" value="Log In">
                <br>			<br>
                <a href ="registro.php">No posees una cuenta?</a>
                <br>
            </form>
            <div>
            </body>';
    } else {
        echo '<script type="text/javascript">location.href = "work.php";</script>';
    }
    ?>
</html>

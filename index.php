<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styleslogin.css">
</head>

<body class="login">
    <!--form de login-->

    <div class="cuadroform">
        <h2>Inicia Sesión</h2>

        <?php
        if (isset($_SESSION['mensaje_error'])) 
        {
            echo '<div class="error">' . $_SESSION['mensaje_error'] . '</div>';
            unset($_SESSION['mensaje_error']);
        }
        ?>

        <form action="validar.php" method="post">
            <div class="usuario">
                <input type="email" name="correo" required="">
                <label>Correo Electrónico</label>
            </div>

            <div class="usuario">
                <input type="password" name="contraseña" required="">
                <label>Contraseña</label>
            </div>

            <div>
                <input class="entrar" type="submit" value="Entrar" name="btnenviar">
            </div>
        </form>
    </div>
</body>

</html>
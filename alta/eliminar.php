<!DOCTYPE html>
<html>

<head>
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="./stylecrud.css">
</head>

<body class="fondoeliminar">
    <div class="contenedoreliminar">
        <h2>Eliminar Producto</h2>
        <?php
        include('conexion.php');

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $id = $_GET['id'];

            $consultaProducto = "SELECT * FROM productos WHERE id = $id";
            $resultado = mysqli_query($conexion, $consultaProducto);

            if ($resultado) {
                if (mysqli_num_rows($resultado) == 1) {
                    $fila = mysqli_fetch_assoc($resultado);
                    echo "<p>¿Estás seguro de que deseas eliminar el producto '" . $fila['nombre'] . "'?</p>";
                    echo "<form action='eliminar_confirmar.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $fila['id'] . "'/>";
                    echo "<input class='entrar' type='submit' value='Eliminar'/>";
                    echo "<a   href='tabla.php'><input class='entrar' type='button' value='cancelar'/></a>";
                    echo "</form>";
                } else {
                    echo "No se encontró el producto.";
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }

            mysqli_close($conexion);
        }
        ?>
    </div>
</body>

</html>

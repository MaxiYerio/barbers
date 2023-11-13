<!DOCTYPE html>
<html>

<head>
    <title>Editar Producto</title>
    <link rel="stylesheet" href="./stylecrud.css">
</head>

<body class="fondoalta">
    <div class="container">
        <div class="cuadroform">
            <h2>Editar Producto</h2>
            <?php
            include('conexion.php');

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                $id = $_GET['id'];

                $consultaProducto = "SELECT * FROM productos WHERE id = $id";
                $resultado = mysqli_query($conexion, $consultaProducto);

                if ($resultado) {
                    if (mysqli_num_rows($resultado) == 1) {
                        $fila = mysqli_fetch_assoc($resultado);
                        echo "<form action='actualizar.php' method='post'>";
                        echo "<input type='hidden' name='id' value='" . $fila['id'] . "'/>";
                        echo "<div class='usuario'>";
                        echo "<input type='text' name='nombre' value='" . $fila['nombre'] . "' required/>";
                        echo "<label>Nombre del producto</label>";
                        echo "</div>";
                        echo "<div class='usuario'>";
                        echo "<input type='number' name='precio' value='" . $fila['precio'] . "' required/>";
                        echo "<label>Precio</label>";
                        echo "</div>";
                        echo "<div class='usuario'>";
                        echo "<label>Descripción:</label>";
                        echo "<br><br>";
                        echo "<textarea name='descripcion' rows='5'>" . $fila['descripcion'] . "</textarea>";
                        echo "</div>";
                        echo "<div class='usuario'>";
                        echo "<label>Imagen:</label>";
                        echo "<div class='SubirArchivo' id='src-file'>";
                        echo "<input type='file' name='imagen' aria-label='Foto'>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div>";
                        echo "<button class='entrar' type='button' onclick='cancelarEdicion()'>Cancelar</button>";
                        echo "<input class='entrar' name='submit' type='submit' value='Aceptar'>";
                        echo "</div>";
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
    </div>

    <script>
        function cancelarEdicion() {
            window.location.href = 'tabla.php';
        }
    </script>
</body>

</html>